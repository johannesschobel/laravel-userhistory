<?php

namespace JohannesSchobel\UserHistory;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class UserHistoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
        $this->publishMigration();
        $this->publishLanguage();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        /*
        $this->mergeConfigFrom(
            __DIR__ . '/config/userhistory.php', 'userhistory'
        );
        */
        //$this->registerProvider();
    }

    /*
    private function registerProvider()
    {
        $this->app->bind('skeleton', function($app){
            return new Skeleton($app);
        });
    }
    */

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/config/userhistory.php' => config_path('userhistory.php'),
        ], 'config');
    }

    /**
     * Publish the migration to the application migration folder
     */
    public function publishMigration()
    {
        $this->publishes([
            __DIR__ . '/migrations/' => base_path('/database/migrations'),
        ], 'migrations');
    }

    /**
     * Publish the languages to the application resources languages folder
     */
    public function publishLanguage()
    {
        $this->publishes([
            __DIR__ . '/resources/' => base_path('/resources'),
        ], 'resources');
    }
}