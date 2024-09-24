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
    return view('memories-cake', ['cakes' => Cake::limit(4)->get()]);
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
        return view('user.admin.dashboard');
    });
    Route::get('/admin/orders', function () {
        return view('user.admin.manage-orders');
    });
    Route::get('/admin/catalog', function () {
        return view('user.admin.catalog');
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

Route::get('/sample', function() {

    $item = [
        "id" => "7",
        "age" => "1",
        "candle_type" => "none",
        "dedication" => "again",
        "quantity" => "2"
    ];

    // request()->

    $validatedData = request()->validate([
        'age' => ['required', 'integer', 'min:0', 'max:150'],
        'candle_type' => ['required'],
        'dedication' => ['required'],
        'quantity' => ['required', 'integer', 'min:1', "max:99"],
        'id' => ['required'],
    ]);

    $item = CartItem::find(7);

    if ($item->cart->user_id !== Auth::user()->id) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    dd($item);

    //$item->update($validatedData);

    return response()->json(['success' => true]);
});


