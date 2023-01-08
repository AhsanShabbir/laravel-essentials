<?php
s
namespace Wisevision\LaravelEssentials;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class LaravelEssentialsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Request::macro('username', function(){
            return request()->username ?? "NotSet";
        });
    }
}
