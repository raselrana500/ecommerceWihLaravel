<?php

/*
|--------------------------------------------------------------------------
| Pages Routes 
|--------------------------------------------------------------------------
|
| ALl the routes for our frontend pages controll
|
*/
Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our admin
|
*/
Route::group(['prefix'=>'admin'],function(){
    Route::get('/index', 'Backend\PagesController@index')->name('admin.index');
    //Admin Login Routes
    Route::get('/', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');
    //reset link send
    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    //reset password
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');
});

/*
|--------------------------------------------------------------------------
| User Activation Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our User
|
*/
Route::get('/token/{token}',  'Frontend\VerificationController@verify')->name('user.verification');

Route::group(['prefix'=>'user'],function()
{
    Route::get('/dashboard','Frontend\UsersController@dashboard')->name('user.dashboard');
    Route::get('/profile','Frontend\UsersController@profile')->name('user.profile');
    Route::post('/profile/update','Frontend\UsersController@profileUpdate')->name('user.profile.update');
});
/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our carts
|
*/
Route::group(['prefix'=>'cart'],function()
{
    Route::get('/','Frontend\CartsController@index')->name('carts');
    Route::post('/store','Frontend\CartsController@store')->name('carts.store');
    Route::post('/update/{id}','Frontend\CartsController@update')->name('carts.update');
    Route::post('/delete/{id}','Frontend\CartsController@destroy')->name('carts.delete');
});
/*
|--------------------------------------------------------------------------
| checkout Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our checkout process
|
*/
Route::group(['prefix'=>'checkout'],function()
{
    Route::get('/','Frontend\checkoutsController@index')->name('checkouts');    
    Route::post('/store','Frontend\checkoutsController@store')->name('checkouts.store');
});
/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our products for frontEnd
|
*/

Route::get('/products', 'Frontend\ProductsController@products')->name('products');
Route::get('/products/{slug}', 'Frontend\ProductsController@show')->name('products.show');
Route::get('/search', 'Frontend\PagesController@search')->name('search');

//categories routes
Route::get('/category', 'Frontend\CategoriesController@index')->name('caegories.index');
Route::get('/category/{id}', 'Frontend\CategoriesController@show')->name('categories.show');
/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our products for frontEnd
|
*/
Route::group(['prefix'=>'admin'],function(){    
    Route::group(['prefix'=>'product'],function(){
        Route::get('/', 'Backend\ProductsController@index')->name('admin.pages.product.index');
        Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
        Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.pages.product.edit');
        Route::Post('/create', 'Backend\ProductsController@Store')->name('admin.product.store');
        Route::Post('/update/{id}', 'Backend\ProductsController@Update')->name('admin.product.update');
        Route::get('/delete/{id}', 'Backend\ProductsController@Delete')->name('admin.pages.product.delete');
    });
});
/*
|--------------------------------------------------------------------------
| Categories Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our products for frontEnd
|
*/
Route::group(['prefix'=>'admin'],function(){
    //Route::get('/', 'Backend\PagesController@index')->name('admin.index');
    Route::group(['prefix'=>'category'],function(){
        Route::get('/', 'Backend\CategoriesController@index')->name('admin.pages.category.index');
        Route::get('/create', 'Backend\CategoriesController@create')->name('admin.category.create');
        Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.pages.category.edit');
        Route::Post('/store', 'Backend\CategoriesController@Store')->name('admin.category.store');
        Route::Post('/update/{id}', 'Backend\CategoriesController@Update')->name('admin.category.update');
        Route::get('/delete/{id}', 'Backend\CategoriesController@Delete')->name('admin.pages.category.delete');
    });
});
/*
|--------------------------------------------------------------------------
| Brands Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our products for frontEnd
|
*/
Route::group(['prefix'=>'admin'],function(){
    //Route::get('/', 'Backend\PagesController@index')->name('admin.index');
    Route::group(['prefix'=>'brand'],function(){
        Route::get('/', 'Backend\BrandsController@index')->name('admin.pages.brand.index');
        Route::get('/create', 'Backend\BrandsController@create')->name('admin.brand.create');
        Route::get('/edit/{id}', 'Backend\BrandsController@edit')->name('admin.pages.brand.edit');
        Route::Post('/store', 'Backend\BrandsController@Store')->name('admin.brand.store');
        Route::Post('/update/{id}', 'Backend\BrandsController@Update')->name('admin.brand.update');
        Route::get('/delete/{id}', 'Backend\BrandsController@Delete')->name('admin.pages.brand.delete');
    });

    Route::group(['prefix'=>'divisions'],function(){
        Route::get('/', 'Backend\DivisionsController@index')->name('admin.pages.divisions.index');
        Route::get('/create', 'Backend\DivisionsController@create')->name('admin.divisions.create');
        Route::get('/edit/{id}', 'Backend\DivisionsController@edit')->name('admin.pages.divisions.edit');
        Route::Post('/store', 'Backend\DivisionsController@Store')->name('admin.divisions.store');
        Route::Post('/update/{id}', 'Backend\DivisionsController@Update')->name('admin.divisions.update');
        Route::get('/delete/{id}', 'Backend\DivisionsController@Delete')->name('admin.pages.divisions.delete');
    });

    Route::group(['prefix'=>'districts'],function(){
        Route::get('/', 'Backend\DistrictsController@index')->name('admin.pages.districts.index');
        Route::get('/create', 'Backend\DistrictsController@create')->name('admin.districts.create');
        Route::get('/edit/{id}', 'Backend\DistrictsController@edit')->name('admin.pages.districts.edit');
        Route::Post('/store', 'Backend\DistrictsController@Store')->name('admin.districts.store');
        Route::Post('/update/{id}', 'Backend\DistrictsController@Update')->name('admin.districts.update');
        Route::get('/delete/{id}', 'Backend\DistrictsController@Delete')->name('admin.pages.districts.delete');
    });

    Route::group(['prefix'=>'orders'],function(){
        Route::get('/', 'Backend\OrdersController@index')->name('admin.orders');
        Route::get('/view/{id}', 'Backend\OrdersController@show')->name('admin.order.show');
        Route::get('/delete/{id}', 'Backend\OrdersController@delete')->name('admin.order.delete');
        Route::post('/completed/{id}', 'Backend\OrdersController@completed')->name('admin.order.completed');
        Route::post('/paid/{id}', 'Backend\OrdersController@paid')->name('admin.order.paid');
    });
    //slider
    Route::group(['prefix'=>'sliders'],function(){
        Route::get('/', 'Backend\SlidersController@index')->name('admin.sliders');
        Route::post('/add', 'Backend\SlidersController@store')->name('admin.slider.store');
        Route::get('/delete/{id}', 'Backend\SlidersController@delete')->name('admin.slider.delete');
        Route::post('/update/{id}', 'Backend\SlidersController@update')->name('admin.slider.update');
    });
   
    
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//api routes
Route::get('get-districts/{id}',function($id){
    return json_encode(App\Models\District::where('division_id', $id)->get());
});
