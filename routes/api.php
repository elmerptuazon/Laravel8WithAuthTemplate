<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PayloadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

Route::prefix('/clients')->middleware(['form-data'])->group(function (){
    Route::post('/token', [ClientController::class, 'getToken']);
});

Route::middleware('auth:sanctum')->group(function (){
    Route::prefix('/payloads')->group(function() {
        Route::get('/generate', [PayloadController::class, 'generate']);
    });
    
    Route::prefix('/auth')->group(function (){
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::prefix('/me')->group(function (){
        Route::get('/posts', [PostController::class, 'myposts']);
    });

    // Route::group(['middleware' => 'owner.only'], function () {
    //     Route::apiResources([
    //         'posts' => PostController::class,
    //     ]);
    // });

    // Route::apiResources([
    //     'posts' => PostController::class,
    //     'posts.comments' => CommentController::class,
    // ])->except(['delete']);

    Route::prefix('/posts')->group(function () {
        Route::post('/', [PostController::class, 'store']);
        Route::put('/{post}', [PostController::class, 'update']);
        Route::delete('/{post}', [PostController::class, 'destroy'])->middleware('owner.only');

        Route::prefix('/{post}/comments')->group(function () {
            Route::get('/', [CommentController::class, 'index']);
            Route::post('/', [CommentController::class, 'store']);
            Route::delete('/{comment}', [CommentController::class, 'destroy'])->middleware(['comment.owner']);
        });
    });
    
});

//public
Route::prefix('/posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{post}', [PostController::class, 'show']);

    Route::prefix('/{post}/comments')->group(function () {
        Route::get('/', [CommentController::class, 'index']);
    });
});