<?php

use App\Http\Controllers\Blog\AdminBlogController;
use App\Http\Controllers\Blog\ClientBlogController;
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
    Route::prefix('/admin')->group(function () {
        Route::prefix('/blogs')->group(function () {
            Route::get('/', [AdminBlogController::class, 'blogList']);
            Route::post('/', [AdminBlogController::class, 'createBlog']);
            Route::put('/', [AdminBlogController::class, 'editBlog']);
            Route::delete('/', [AdminBlogController::class, 'deleteBlog']);
            Route::get('/{blogId}', [AdminBlogController::class, 'blog']);
            Route::put('/mainImage', [AdminBlogController::class, 'editBlogMainImage']);
        });
    });
});

Route::prefix('/blogs')->group(function () {
    Route::get('/', [ClientBlogController::class, 'activeBlogList']);
    Route::prefix('/{blogId}')->group(function () {
        Route::get('/', [ClientBlogController::class, 'detailActiveBlog']);
        Route::post('/access', [ClientBlogController::class, 'detialActiveBlogAccess']);
    });
});
