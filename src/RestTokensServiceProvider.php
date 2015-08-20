<?php

namespace KalebClark\RestTokens;

use Illuminate\Support\ServiceProvider;

class RestTokensServiceProvider extends ServiceProvider
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

        // Autoload required packages
//        require __DIR__.'/../vendor/autoload.php';

        // Load Views from here
        $this->loadViewsFrom(
            __DIR__.'/views', 'RestTokens'
        );

        // Publishing views
//        $this->publishes([
//            __DIR__ . '/views' => base_path('resources/views'),
//        ]);

        // Loading routes
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }

        // Publishing configs
        $this->publishes([
            __DIR__ . '/config/my-package.php' => config_path('my-package.php'),
        ]);





        // Loading translations
        $this->loadTranslationsFrom(__DIR__ . '/translations', 'my-package');

        // Publishing public assets
        $this->publishes([
            __DIR__ . '/assets' => public_path('my-vendor/my-package'),
        ], 'public');

        // Publishing migrations
        $this->publishes([
            __DIR__ . '/migrations' => database_path('/migrations'),
        ], 'migrations');

        // Publishing seeds
        $this->publishes([
            __DIR__ . '/seeds' => database_path('/seeds'),
        ], 'migrations');

    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('RestTokensClass', 'KalebClark\RestTokens\RestTokensClass');
    }

}
