<?php

use App\Http\Controllers\Blog\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');

Route::get('blog/categories/{cagegory}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/categories', 'CategoryController@index')->name('categories');

    Route::get('/categories/new', 'CategoryController@create')->name('categories.create');

    Route::post('/categories/store', 'CategoryController@store')->name('categories.store');

    Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');

    Route::put('/categories/{category}/update', 'CategoryController@update')->name('categories.update');

    Route::delete('/categories/{category}/delete', 'CategoryController@destroy')->name('categories.destroy');

    Route::resource('posts', 'PostsController');

    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');

    Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-post');

    Route::resource('tags', 'TagsController');
});


Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});