<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('user', UserController::class);

        Route::resource('category', CategoryController::class);

        Route::resource('post', PostController::class);

        Route::resource('contactadmin', ContactAdminController::class);
        Route::get('contactdetails', [ContactAdminController::class, 'contactdetails']);
    });
});

Route::get('/', function () {
    return view('welcome');
});

######## Shop Header section starts from here ############
Route::resource('shop', ShopController::class);
Route::get('/shopcategory', [ShopController::class, 'category'])->name('shopcategory');
Route::get('/productdetail', [ShopController::class, 'productdetail'])->name('productdetail');
Route::get('/productcheckout', [ShopController::class, 'productcheckout'])->name('productcheckout');
Route::get('/shoppingcart', [ShopController::class, 'shoppingcart'])->name('shoppingcart');
Route::get('/shop-confirmation', [ShopController::class, 'shopconfirmation'])->name('shopconfirmation');
############  till here shop header section ####################

############# Blog controller section starts from here ################
Route::prefix('blog')->group(function () {
    Route::resource('blogs', BlogController::class);
    Route::get('/blogdetail/{id}', [BlogController::class, 'blogdetail'])->name('blogdetail');
    Route::get('searchblog', [BlogController::class,'search'])->name('blog.search');
});
############## till here blog controller section ###################
Route::resource('comment', CommentController::class);

######### Contact Controller section starts from here#########
Route::resource('contact', ContactController::class);
########### till here contact controller section ###########
