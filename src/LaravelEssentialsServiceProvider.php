<?php
namespace Wisevision\LaravelEssentials;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Wisevision\LaravelEssentials\Commands\MakeRepository;

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
        // Load the helpers in src/helpers.php
        if (file_exists($file = __DIR__ . '/helpers/misc.php')) {
            require $file;
        }

         // Load the helpers in src/helpers/query.php
         if (file_exists($file = __DIR__ . '/helpers/query.php')) {
            require $file;
        }

        $this->commands(MakeRepository::class);
    }
}
