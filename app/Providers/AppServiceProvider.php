<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('failed', function ($errors, $status = 400) {
            return Response::json([
                'status' => false,
                'errors' => $errors
            ], $status);
        });

        Response::macro('success', function ($data = [], $status = 200) {
            return Response::json([
                'status' => true,
                'data' => $data
            ], $status);
        });
    }
}
