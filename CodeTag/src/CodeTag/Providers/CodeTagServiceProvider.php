<?php

namespace CodePress\CodeTag\Providers;


use Cviebrock\EloquentSluggable\ServiceProvider;

class CodeTagServiceProvider extends ServiceProvider
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