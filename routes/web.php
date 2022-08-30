<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function (string $name) {
   return "hello, $name";
});

Route::get('/about', function () {
   return <<<php
<h1>О нас</h1>
<p>Pellentesque porta tortor est, in ultrices nunc tempor sed. Aliquam eu vulputate metus. Maecenas at dapibus sapien. Cras non orci pulvinar, venenatis ante non, fringilla odio. Etiam consectetur hendrerit tortor. In venenatis elementum sapien. Aenean feugiat commodo nisl vitae finibus. Quisque sit amet felis ac mi aliquam malesuada non tempus nisl. Sed dapibus augue arcu, eget blandit elit suscipit in. Aliquam eu eros purus. Curabitur posuere felis non libero volutpat, non condimentum mauris scelerisque.</p>
<p>Donec malesuada massa mattis, facilisis urna vel, tempus purus. Aliquam sed pharetra urna, a tempus lacus. Sed aliquam elementum commodo. Nunc molestie ligula ornare, semper augue eget, faucibus lacus. Nam nec nulla tempus felis ullamcorper rhoncus. Praesent at arcu ac velit ullamcorper molestie. Curabitur convallis quam ac sapien congue rhoncus. Pellentesque vulputate quam a arcu porta, ut dictum orci aliquam. Sed eget bibendum tortor. Mauris ullamcorper justo sed lorem pharetra congue. Curabitur venenatis dignissim lacus eget venenatis. Nulla auctor a lacus finibus aliquet. Curabitur elit ante, pretium at ornare quis, dapibus ac mauris.</p>
php;
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});


//news routes
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

//categories routes
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('categories.show');
