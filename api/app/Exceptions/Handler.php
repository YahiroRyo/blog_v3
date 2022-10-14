<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Validation\ValidationException;
use Packages\Infrastructure\Repositories\Exceptions\Blog\FailCreateBlogException;
use Packages\Infrastructure\Repositories\Exceptions\Blog\FailEditBlogException;
use Packages\Infrastructure\Repositories\Exceptions\Blog\FailEditBlogMainImageException;
use Packages\Infrastructure\Repositories\Exceptions\User\FailInitUserException;
use Packages\Infrastructure\Repositories\Exceptions\User\IllegalExistsUserException;
use Throwable;

class Handler extends ExceptionHandler {
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $e) {
        if (!$request->isMethod('GET')) {
            logs()->error($request->all());
        }

        if ($e instanceof ModelNotFoundException) {
            return response($e->getMessage(), 404);
        }

        if ($e instanceof AuthenticationException) {
            return response('認証に失敗しました。', 400);
        }

        if ($e instanceof IllegalExistsUserException) {
            return response('ユーザーは既に存在しているため、ユーザーの新規作成は行えません。', 500);
        }

        if ($e instanceof FailInitUserException) {
            return response('ユーザーの作成に失敗しました。時間をおいてからもう一度お試しください。', 500);
        }

        if ($e instanceof FailCreateBlogException) {
            return response('ブログの作成に失敗しました。時間をおいてからもう一度お試しください。', 500);
        }

        if ($e instanceof FailEditBlogException) {
            return response('ブログの更新に失敗しました。時間をおいてからもう一度お試しください。', 500);
        }

        if ($e instanceof FailEditBlogMainImageException) {
            return response('ブログメインアイコンの更新に失敗しました。時間をおいてからもう一度お試しください。', 500);
        }

        if ($e instanceof ValidationException) {
            return response($e->errors(), 400);
        }

        logs()->error($e);

        return response('不明なエラーが発生しました。時間をおいてからもう一度お試しください。');
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register() {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
