<?php

use App\Core\Request;
use App\Core\Route;

$request = new Request();
try {
    //-----------------------------------------CLIENT ROUTER----------------------------------------//
    // Site router
    Route::get('/', 'App\Controllers\HomeController@index');
    Route::get('/404', 'App\Controllers\HomeController@errorpage');
    Route::get('/mouse', 'App\Controllers\ProductController@getMouse');  
    Route::get('/cart', 'App\Controllers\CartController@cart');
    Route::post('/add-cart', 'App\Controllers\CartController@addCart');
    Route::get('/deletecart{id}', 'App\Controllers\CartController@deleteCart');
    Route::get('/detail{id}', 'App\Controllers\ProductController@getDetail');    
    Route::get('/introduce', 'App\Controllers\SiteController@getIntroduce');    
    Route::get('/help', 'App\Controllers\SiteController@getHelp');    
    // Login router
    Route::get('/login', 'App\Controllers\AuthController@getLogin');    
    Route::post('/login', 'App\Controllers\AuthController@postLogin');    
    //Logout router
    Route::get('/logout', 'App\Controllers\AuthController@getLogout');    
    //Regist router
    Route::get('/register', 'App\Controllers\AuthController@getRegister');    
    Route::post('/register', 'App\Controllers\AuthController@postRegister');    

    //-----------------------------------------ADMIN ROUTER-----------------------------------------//

    //admin site router
    Route::get('/admin', 'App\Controllers\ProductController@getProduct');    
    //category admin router
    Route::get('/admin/category', 'App\Controllers\CategoryController@getCategory');    
    Route::get('/admin/add-category', 'App\Controllers\CategoryController@addCategory');    
    Route::post('/admin/post-category', 'App\Controllers\CategoryController@postCategory');    
    Route::get('/admin/updatecat{id}', 'App\Controllers\CategoryController@updateCat');
    Route::post('/admin/updatecat', 'App\Controllers\CategoryController@postUpdateCat');    
    Route::get('/admin/deletecat{id}', 'App\Controllers\CategoryController@deleteCat');
    //product admin router
    Route::get('/admin', 'App\Controllers\ProductController@getProduct');
    Route::get('/admin/add-product', 'App\Controllers\ProductController@addProduct');
    Route::post('/admin/post-product', 'App\Controllers\ProductController@postProduct');    
    Route::get('/admin/updateprod{id}', 'App\Controllers\ProductController@updateProduct');
    Route::post('/admin/updateprod', 'App\Controllers\ProductController@postUpdateProduct');    
    Route::get('/admin/deleteprod{id}', 'App\Controllers\ProductController@deleteProduct');
    //user admin router     
    Route::get('/admin/user', 'App\Controllers\UserController@getUser');
    
    Route::resolve();
} catch (Exception $e) {
    header( 'Location: /404 ');
}

