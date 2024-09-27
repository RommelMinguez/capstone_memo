<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

use App\Models\Cake;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\Order;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Validation\ValidationException;



Route::view('/laravel', 'laravel-welcome');

Route::get('/', function () {
    return view('memories-cake', ['cakes' => Cake::limit(4)->latest()->get()]);
});



Route::get('/cakes', function () {
    return view('cakes.index', ['cakes' => Cake::simplePaginate(21)]);
});

Route::get('/cakes/{cake}', function (Cake $cake) {
    return view('cakes.show', [
        'cake' => $cake,
        'show_modal' => session('showModal'),
    ]);
});


Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


Route::middleware(['auth'])->group(function () {
    Route::get('/user/order', [OrderController::class, 'create']);
    Route::post('/user/order', [OrderController::class, 'store']);
    Route::post('/user/order/now', [OrderController::class, 'buyNow']);
});


Route::middleware([CustomerMiddleware::class])->group(function () {
    Route::get('/user', [UserController::class, 'showtrackOrder']);
    Route::get('/user/message', [UserController::class, 'showMessage']);
    Route::get('/user/info', [UserController::class, 'showInfo']);
    Route::patch('/user/info', [UserController::class, 'updateInfo']);
    Route::get('/user/change-password', [UserController::class, 'showChangePassword']);
    Route::patch('/user/change-password', [UserController::class, 'updatePassword']);

    Route::get('/user/cart', [CartController::class, 'index']);
    Route::post('/user/cart', [CartController::class, 'store']);
    Route::patch('/user/cart', [CartController::class, 'remove']);
    Route::put('/user/cart', [CartController::class, 'update']);
    Route::post('/user/cart/check-out', [CartController::class, 'checkOut']);
});


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {

        $countPerStatus = OrderItem::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();
        $statusArr = ['pending', 'baking', 'receive', 'review', 'completed', 'canceled'];
        $totalOrder = null;

        foreach($statusArr as $status) {
            if (!array_key_exists($status, $countPerStatus)) {
                $countPerStatus[$status] = 0;
            }
            if($status != 'canceled') {
                $totalOrder += $countPerStatus[$status];
            }
        }

        $bestSeller = OrderItem::join('cakes', 'order_items.cake_id', '=', 'cakes.id')
            ->select('cakes.id', 'cakes.name', DB::raw('COUNT(order_items.cake_id) as total_orders'))
            ->groupBy('cakes.id', 'cakes.name')
            ->orderBy('total_orders', 'DESC')
            ->first();


        $income = OrderItem::sum('sub_total') - OrderItem::where('status', 'canceled')->sum('sub_total');

        $latestOrders = OrderItem::with('order.user', 'cake')->latest()->limit(10)->get();

        return view('user.admin.dashboard', [
            'statusCount' => $countPerStatus,
            'totalOrder' => $totalOrder,
            'bestSeller' => $bestSeller,
            'income' => $income,
            'latestOrders' => $latestOrders
        ]);
    });
    Route::get('/admin/orders', function () {
        return view('user.admin.manage-orders');
    });
    Route::get('/admin/catalog', function () {
        return view('user.admin.catalog', ['cakes' => Cake::latest()->simplePaginate(20)]);
    });
    Route::get('/admin/sales', function () {
        return view('user.admin.sales');
    });
});


















Route::get('user/reset-password', function() {
    Auth::user()->update([
        'password' => '123456789'
    ]);
    return redirect('/user/change-password');
});

Route::view('/test', 'test');

Route::get('/test-query', function() {
    // GET COUNT ON EVERY STATUS
    $countPerStatus = OrderItem::select('status', DB::raw('count(*) as total'))
                    ->groupBy('status')
                    ->pluck('total', 'status')
                    ->toArray();
    $statusArr = ['pending', 'baking', 'receive', 'review', 'completed', 'canceled'];
    $totalOrder = null;

    foreach($statusArr as $status) {
        if (!array_key_exists($status, $countPerStatus)) {
            $countPerStatus[$status] = 1;
        }
        if($status != 'canceled') {
            $totalOrder += $countPerStatus[$status];
        }
    }

    $bestSeller = OrderItem::join('cakes', 'order_items.cake_id', '=', 'cakes.id')
                    ->select('cakes.id', 'cakes.name', DB::raw('COUNT(order_items.cake_id) as total_orders'))
                    ->groupBy('cakes.id', 'cakes.name')
                    ->orderBy('total_orders', 'DESC')
                    ->first();


    $income = OrderItem::sum('sub_total') - OrderItem::where('status', 'canceled')->sum('sub_total');

    dd($countPerStatus, $bestSeller, $income, $countPerStatus, $totalOrder);
});

Route::get('/test-upload', function() {
    return view('test-upload');
});
Route::post('/test-upload', function() {
    // Validate the image
    request()->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Limit size to 2MB
    ]);

    // Store the image
    $path = request()->file('image')->store('images', 'public');

    //dd($path);

    // Optionally, you can save the path in the database or return a response
    return back()->with('success', 'Image uploaded successfully!')->with('path', $path);
})->name('image.store');


