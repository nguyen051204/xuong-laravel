<?php


use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;


use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for     your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $product=Product::query()->latest('id')->limit(4)->get();
    return view('welcome',compact('product'));
});

Route::get('/admin',function (){
    return view('admin.dashboard');
})->name('dashboard');


Route::get('auth/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('auth/login', [LoginController::class, 'login'])->name('login.post');

Route::post('auth/Logout', [LoginController::class, 'logout'])->name('logout');


Route::get('auth/register', [RegisterController::class, 'showFormRegister'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('shop', [ClientController::class, 'shop']);
Route::get('product', [ClientController::class, 'product']);
Route::get('about', [ClientController::class, 'about']);
Route::get('contact', [ClientController::class, 'contact']);

Route::get('checkout', [ClientController::class, 'checkout']);
Route::get('dashboard', [ClientController::class, 'dashboard']);
Route::get('profile', [ClientController::class, 'profile']);
Route::get('order', [ClientController::class, 'order']);
Route::get('setting', [ClientController::class, 'setting']);
Route::get('dashboard', [ClientController::class, 'dashboard']);



Route::get('/product/{slug}',[ProductController::class,'detail'])->name('product.detail');
Route::post('cart/add',[CartController::class,'add'])->name('cart.add');
Route::get('cart/list',[CartController::class,'list'])->name('cart.list');
Route::post('order/save',[CartController::class,'order'])->name('order.save');

Route::get('order/list',[OrderController::class,'list'])->name('order.list');


Route::post('product/comment/{id}',[BinhLuanController::class,'store'])->name('comment.store');
