<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InvitationContoller;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserCoursController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('commentaires', CommentaireController::class);
    Route::apiResource('cours', CoursController::class);
    Route::apiResource('faq', FaqController::class);
    Route::apiResource('invitation', InvitationContoller::class);
    Route::apiResource('module', ModuleController::class);
    Route::apiResource('notes', NoteController::class);
    Route::apiResource('users_cours', UserCoursController::class);
});
