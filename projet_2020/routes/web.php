<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvController;

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
// Route::get('/', function () {
//     return view('auth/login');
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/administrationUser', function () {
    return view('administration.UserAdmin');
});
Route::get('/administrationModule', function () {
    return view('administration.CreateCoursAdmin');
});

Route::group(['middleware' => ['auth']], function () {

});

// Toutes les routes commencant par "/admin" utilisent le middleware IsAdmin (vérifie si l'user est ADMIN).
Route::prefix('admin')
    ->middleware(IsAdmin::class)
    ->group(function() {

        // Mettez vos routes en dessous de la première
        // Route de base renvoyant au dashboard de l'administration
        Route::get('/', function() {
            return view('dashboard');
        })->name('dashboard');
    });

//Test de l'ajout d'utilisateurs par fichier .csv;
Route::get('/csv', function (){
    return view('administration.Csv');
});
Route::get('CsvController', CsvController::class, 'index');

require __DIR__.'/auth.php';
