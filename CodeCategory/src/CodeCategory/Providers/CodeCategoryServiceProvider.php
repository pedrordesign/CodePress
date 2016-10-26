<?php

namespace CodePress\CodeCategory\Providers;


use Cviebrock\EloquentSluggable\ServiceProvider;

class CodeCategoryServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        $this->publishes(
            [__DIR__ . '/../../resources/migrations' => base_path('database/migrations')],
            'migrations' //dizer que isso é uma miração e que é pra copiar pra pasta de migração do laravel no artisan:publish
        );
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/codecategory', 'codecategory');
        require __DIR__ . '/../routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

}