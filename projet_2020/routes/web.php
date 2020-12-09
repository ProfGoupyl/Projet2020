<?php

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

Route::get('/', function()
{
    return View('welcome');
});
Route::get('home', function()
{
    return View('pages.home');
});
Route::get('user', function()
{
    return View('pages.user');
});
Route::get('cours', function()
{
    return View('pages.cours');
});
Route::get('session', function()
{
    return View('pages.session');
});
Route::get('profile', function()
{
    return View('pages.profile');
});
Route::get('faq', function()
{
    return View('pages.faq');
});
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';