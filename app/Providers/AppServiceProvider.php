<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //response
        \Response::macro('success', function ($data=[], $code=200) {
            return response()->json($data, $code);
        });

        \Response::macro('error', function ($message) {
            return response()->json([
                'status' => 'error',
                'message' => env("APP_ENV") == "local" ? $message : 'Operation Failed'
            ]);
        });
    }
}
