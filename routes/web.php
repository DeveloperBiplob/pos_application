<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchaseController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserSaleController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/register', function () {
    return view()->exists('auth.register') ? view('auth.register') : abort(404);
})->name('register')->middleware('guest');




Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'con_password' => 'required',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'address' => $request->address,
        'phone' => $request->phone,
    ];

    $admin = Admin::create($data);
    event(new Registered($admin));
    $request->session()->regenerate();
    Auth::guard('web')->login($admin);
    return redirect()->intended('dashboard');
})->name('register');


Route::get('login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('login', function (Request $request) {
    // return $request->all();
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::guard('web')->attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('login');


Route::post('/logout', function (Request $request) {

    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('login');
})->name('logout');





Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');

    Route::resource('/user', UserController::class);
    Route::get('user/{id}/sales', [UserSaleController::class, 'index'])->name('user.sale');
    Route::get('user/{id}/purchases', [UserPurchaseController::class, 'index'])->name('user.purchases');
    Route::get('user/{id}/payments', [UserPaymentsController::class, 'index'])->name('user.payments');
    Route::get('user/{id}/receipts', [UserReceiptsController::class, 'index'])->name('user.receipts');



    Route::resource('/group', UserGroupController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
});
