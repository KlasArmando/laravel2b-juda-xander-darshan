<?php

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

Route::resource('anime', 'AnimeController');
Route::resource('category','CategoryController');

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Admin-panel users
Route::get('/admin-panel/users', 'UserController@index')->name('user.index');
Route::get('/admin-panel/users/create', 'UserController@create')->name('user.create');
Route::post('/admin-panel/users', 'UserController@store')->name('user.store');
Route::get('/admin-panel/users/{user}', 'UserController@show')->name('user.show');
Route::get('/admin-panel/users/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('/admin-panel/users/{user}', 'UserController@update')->name('user.update');
Route::delete('/admin-panel/users/{user}', 'UserController@delete')->name('user.delete');
Route::get('/admin-panel/mangas', 'MangaController@archivedIndex')->name('manga.archivedIndex');
Route::get('/admin-panel/roles', 'RoleController@index')->name('role.index');
Route::get('/admin-panel/roles/create', 'RoleController@create')->name('role.create');
Route::post('/admin-panel/roles', 'RoleController@store')->name('role.store');
Route::get('/admin-panel/roles/{role}', 'RoleController@show')->name('role.show');
Route::get('/admin-panel/roles/{role}/edit', 'RoleController@edit')->name('role.edit');
Route::patch('/admin-panel/roles/{role}', 'RoleController@update')->name('role.update');
Route::delete('/admin-panel/roles/{role}', 'RoleController@destroy')->name('role.delete');

Route::group(['middleware' => ['auth']], function()
{
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('manga', 'MangaController');
    Route::resource('anime', 'AnimeController');
    Route::resource('category','CategoryController');
});
