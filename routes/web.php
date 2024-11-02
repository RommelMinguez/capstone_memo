<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use App\Models\ArchivedCake;
use App\Models\Tag;
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

Route::get('/about', function() {
    return view('about');
});

Route::get('/', function () {
    return view('memories-cake', ['cakes' => Cake::limit(4)->latest()->get()]);
});



Route::get('/cakes', [CakeController::class, 'index']);
Route::get('/cakes/search', [CakeController::class, 'search']);
Route::get('/cakes/custom', [CustomOrderController::class, 'create'])->middleware([CustomerMiddleware::class]);
Route::post('/cakes/custom', [CustomOrderController::class, 'store'])->middleware([CustomerMiddleware::class]);
Route::get('/cakes/{cake}', [CakeController::class, 'show']);


Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


Route::post('/user/order/now', [OrderController::class, 'buyNow']);
Route::post('/user/cart', [CartController::class, 'store']);


Route::middleware(['auth'])->group(function () {
    Route::get('/user/order', [OrderController::class, 'create']);
    Route::post('/user/order', [OrderController::class, 'store']);

    Route::get('/user/info', [UserController::class, 'showInfo']);
    Route::patch('/user/info', [UserController::class, 'updateInfo']);
    Route::get('/user/change-password', [UserController::class, 'showChangePassword']);
    Route::patch('/user/change-password', [UserController::class, 'updatePassword']);

    Route::get('/user/address-api/region', [AddressController::class, 'getRegion']);
    Route::get('/user/address-api/province/{region}', [AddressController::class, 'getProvince']);
    Route::get('/user/address-api/cityMun/{province}', [AddressController::class, 'getCityMun']);
    Route::get('/user/address-api/barangay/{cityMun}', [AddressController::class, 'getBarangay']);

    Route::get('/user/address', [AddressController::class, 'index']);
    Route::post('/user/address', [AddressController::class, 'store']);
    Route::patch('/user/address/{address}', [AddressController::class, 'updateMainAddress']);
    Route::put('/user/address/{address}', [AddressController::class, 'updateAddress']);
    Route::delete('/user/address/{address}', [AddressController::class, 'destroy']);

    Route::post('/user/review', [ReviewController::class, 'store']);
    Route::patch('/user/review/{review}', [ReviewController::class, 'update']);
});


Route::middleware([CustomerMiddleware::class])->group(function () {
    Route::get('/user', [UserController::class, 'showtrackOrder']);
    Route::patch('/user/cancel-order/{order}', [OrderController::class, 'userCancelOrder']);
    Route::get('/user/message', [UserController::class, 'showMessage']);

    Route::get('/user/cart', [CartController::class, 'index']);

    Route::patch('/user/cart', [CartController::class, 'remove']);
    Route::put('/user/cart', [CartController::class, 'update']);
    Route::post('/user/cart/check-out', [CartController::class, 'checkOut']);

    Route::get('/user/custom-order', [CustomOrderController::class, 'trackCustom']);
});


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/orders', [AdminController::class, 'manageOrders']);
    Route::get('/admin/orders/{item}', [AdminController::class, 'showOrder']);
    Route::patch('/admin/order/{order}', [AdminController::class, 'updateStatus']);

    Route::get('/admin/custom', [CustomOrderController::class, 'manageCustom']);

    Route::get('/admin/catalog', [CakeController::class, 'create']);
    Route::post('/admin/catalog', [CakeController::class, 'store']);
    Route::get('/admin/catalog/search', [CakeController::class, 'searchCatalog']);
    Route::delete('/admin/catalog/{cake}', [CakeController::class, 'archivedCake']);
    Route::patch('/admin/catalog/{cake}', [CakeController::class, 'update']);

    Route::get('/admin/tags', [TagController::class, 'index']);
    Route::post('/admin/tags', [TagController::class, 'store']);
    Route::patch('/admin/tags', [TagController::class, 'update']);
    Route::delete('/admin/tags', [TagController::class, 'destroy']);

    Route::get('/admin/candle', function () {
        return view('user.admin.candle');
    });
    Route::get('/admin/sales', function () {
        return view('user.admin.sales');
    });
});
















Route::get('/admin/catalog/restore', function() {
    $archive = ArchivedCake::all();

    foreach ($archive as $cake) {
        DB::transaction(function () use ($cake) {
            Cake::create($cake->toArray());
            $cake->delete();
        });
    }

    return redirect('/admin/catalog')->with('success', 'Archived Cakes Restored');
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

    dd('ok');
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

