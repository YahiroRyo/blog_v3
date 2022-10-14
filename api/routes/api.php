<?php

use App\Http\Controllers\Blog\AdminBlogController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/blogs')->group(function () {
        Route::post('/', [AdminBlogController::class, 'createBlog']);
        Route::put('/', [AdminBlogController::class, 'editBlog']);
        Route::delete('/', [AdminBlogController::class, 'deleteBlog']);
        Route::put('/mainImage', [AdminBlogController::class, 'editBlogMainImage']);
    });
});
