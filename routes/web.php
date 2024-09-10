<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WelcomeController;
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



// Route::middleware(['auth:sanctum', 'redirect',config('jetstream.auth_session'), 'verified',])->group(function () {

//     Route::prefix('admin')->group(function () {
//         Route::get('/dashboard', function () {
//             return view('dashboard');
//         })->name('dashboard');

//         Route::resource('user', UserController::class);

//         Route::resource('category', CategoryController::class);

//         Route::resource('post', PostController::class);

//         Route::resource('contactadmin', ContactAdminController::class);
//         Route::get('contactdetails', [ContactAdminController::class, 'contactdetails']);

//         Route::resource('products', AdminProductController::class);


//         Route::resource('aboutus', AboutUsController::class);
//     });
// });

Route::middleware(['auth:sanctum', 'redirect', config('jetstream.auth_session'), 'verified', 'preventbackhistory'])
    ->prefix('admin')
    ->group(function () {

        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');

        Route::resource('user', UserController::class);

        Route::resource('category', CategoryController::class);

        Route::resource('post', PostController::class);

        Route::resource('contactadmin', ContactAdminController::class);
        Route::get('contactdetails', [ContactAdminController::class, 'contactdetails']);

        Route::resource('products', AdminProductController::class);
        Route::get('productreview', [AdminProductController::class, 'productreview']);

        Route::resource('aboutus', AboutUsController::class);

        Route::get('admincomment', [AdminCommentController::class, 'index']);

        Route::post('/import', [UserController::class, 'import']);
        Route::get('profile', [UserController::class, 'profile']);


        Route::post('/import-product', [AdminProductController::class, 'import']);

        Route::resource('image', ImageController::class);
        Route::post('/updateimage/{id}', [ImageController::class, 'updateimagestatus']);

        Route::get('frontpagesliderimage',[ImageController::class,'frontpagesliderimage']);

        Route::resource('role', RoleController::class);

        Route::resource('dashboard', AdminDashboard::class);

        Route::resource('author', AuthorController::class);
    });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);


######## Shop Header section starts from here ############
Route::resource('shop', ShopController::class);
Route::get('/shopcategory', [ShopController::class, 'category'])->name('shopcategory');
Route::get('/productdetail/{id}', [ShopController::class, 'productdetail']);
Route::get('/productcheckout', [ShopController::class, 'productcheckout'])->name('productcheckout');
Route::get('/shoppingcart', [ShopController::class, 'shoppingcart'])->name('shoppingcart');
Route::get('/shop-confirmation', [ShopController::class, 'shopconfirmation'])->name('shopconfirmation');

Route::post('review/{id}', [ShopController::class, 'review']);

Route::post('product_remove/{id}', [ShopController::class, 'product_remove']);
############  till here shop header section ####################

######## Product Cart functionality starts here added by me today ##########################
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart']);
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
############### till here for the prodcut cart functionality ##############

############# Blog controller section starts from here ################
Route::prefix('blog')->group(function () {
    Route::resource('blogs', BlogController::class);
    Route::get('/blogdetail/{id}', [BlogController::class, 'blogdetail'])->name('blogdetail');
    Route::get('searchblog', [BlogController::class, 'search'])->name('blog.search');
    Route::post('/comment/{id}', [BlogController::class, 'comment']);
});


### About Us Data on web starts here #######
Route::get('/about-us', [App\Http\Controllers\Admin\AboutUsController::class, 'getaboutus']);
######### till here about us data ##########

######### Contact Controller section starts from here#########
Route::resource('contact', ContactController::class);
########### till here contact controller section ###########


######### Paypal Integration #########
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
######### till here paypal integration
