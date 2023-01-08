<?php
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
        // Request::macro('username', function(){
        //     return request()->username ?? "NotSet";
        // });

          /*
         * Registering the helper methods to package
         */
        $this->registerHelpers();

    }

    public function registerHelpers()
    {
        // Load the helpers in src/functions.php
        if (file_exists($file = __DIR__ . '/helpers.php')) {
            require $file;
        }
    }
}
