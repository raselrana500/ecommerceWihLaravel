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
| Products Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our products for frontEnd
|
*/

Route::get('/products', 'Frontend\ProductsController@products')->name('products');
/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
|
| ALl the routes for our products for frontEnd
|
*/
Route::group(['prefix'=>'admin'],function(){
    Route::get('/', 'Backend\PagesController@index')->name('admin.index');
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
   
    
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
