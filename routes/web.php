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
Route::resource('background', 'BackgroundController');
Route::resource('category','CategoryController');
Route::resource('/admin-panel/users', 'UserController')->names([
    'index' => 'user.index',
    'create' => 'user.create',
    'store' => 'user.store',
    'edit' => 'user.edit',
    'update' => 'user.update',
    'destroy' => 'user.delete',
    'show' => 'user.show'
]);


Route::post('/admin-panel/anime/search', 'AnimeController@search')->name('anime.search');

Route::post('/admin-panel/users/search','UserController@search')->name('user.search');
Route::post('/manga/search','MangaController@search')->name('manga.search');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Admin-panel users
Route::get('/admin-panel/mangas', 'MangaController@archivedIndex')->name('manga.archivedIndex');
Route::get('/admin-panel/anime', 'AnimeController@archivedIndex')->name('anime.archivedIndex');
Route::get('/admin-panel/roles', 'RoleController@index')->name('role.index');
Route::get('/admin-panel/roles/create', 'RoleController@create')->name('role.create');
Route::post('/admin-panel/roles', 'RoleController@store')->name('role.store');
Route::get('/admin-panel/roles/{role}', 'RoleController@show')->name('role.show');
Route::get('/admin-panel/roles/{role}/edit', 'RoleController@edit')->name('role.edit');
Route::patch('/admin-panel/roles/{role}', 'RoleController@update')->name('role.update');
Route::delete('/admin-panel/roles/{role}', 'RoleController@destroy')->name('role.delete');
Route::patch('/manga/archive/{manga}', 'MangaController@archive')->name('manga.archived');
Route::patch('/anime/archive/{anime}', 'AnimeController@archive')->name('anime.archived');
Route::patch('/admin-panel/mangas/reuse/{manga}', 'MangaController@reuse')->name('manga.reuse');
Route::patch('/admin-panel/anime/reuse/{anime}', 'AnimeController@reuse')->name('anime.reuse');


Route::group(['middleware' => ['auth']], function()
{
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('manga', 'MangaController');
    Route::resource('anime', 'AnimeController');
    Route::resource('category','CategoryController');
});

Route::get('users/{user}', function (\App\User $user) {
    return view('user.userShow',compact('user'));
})->name('user.publicShow');

Route::get('users', function () {
    $users = \App\User::all();
    return view('user.userIndex',compact('users'));
})->name('user.publicIndex');
