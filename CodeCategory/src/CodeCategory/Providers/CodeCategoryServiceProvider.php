<?php
/**
 * Created by PhpStorm.
 * User: sh_ntbk_hp
 * Date: 29/09/16
 * Time: 08:14
 */

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