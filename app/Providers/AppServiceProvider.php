<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Illuminate\Contracts\Routing\ResponseFactory::class, function () {
            return new \Laravel\Lumen\Http\ResponseFactory();
        });
    }

    public function boot()
    {
        // Route::model('produk', App\Produk::class);
        Response::macro('success', function ($message, $data) {
            return response()->json(
                [
                    'status' => 'Success',
                    'response_code' => 200,
                    'message' => $message,
                    'data' => $data,
                ],
                200
            );
        });

        Response::macro('error', function ($message, $data) {
            return response()->json(
                [
                    'status' => 'Error',
                    'response_code' => 422,
                    'message' => $message,
                    'data' => $data,
                ],
                422
            );
        });

       
        Response::macro('validation', function ($message) {
            return response()->json(
                [
                    'status' => 'Error',
                    'response_code' => 422,
                    'message' => $message,
                ],
                422
            );
        });

        Response::macro('isActive', function ($message) {
            return response()->json(
                [
                    'status' => 'Success',
                    'response_code' => 200,
                    'message' => $message,
                ],
                200
            );
        });
    }
}
