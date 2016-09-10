<?php

namespace JohannesSchobel\UserHistory;

use Illuminate\Support\ServiceProvider;

class UserHistoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $config = $this->app['config']['userhistory'];

        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'userhistory');

        $this->publishes([
            __DIR__ . '/../../migrations/' => base_path('/database/migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../../resources/lang'     => $this->resource_path('lang/vendor/userhistory'),
        ], 'resources');

        $this->publishes([
            __DIR__ . '/../../config/userhistory.php' => config_path('userhistory.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setupConfig();
    }

    /**
     * Get the Configuration
     */
    private function setupConfig() {
        $this->mergeConfigFrom(realpath(__DIR__ . '/../../config/userhistory.php'), 'userhistory');
    }

    /**
     * Return a fully qualified path to a given file.
     *
     * @param string $path
     *
     * @return string
     */
    public function resource_path($path = '')
    {
        return app()->basePath().'/resources'.($path ? '/'.$path : $path);
    }
}