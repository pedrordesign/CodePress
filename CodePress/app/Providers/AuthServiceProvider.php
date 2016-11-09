<?php

namespace App\Providers;

use App\Policies\CategoryPolicy;
use CodePress\CodeCategory\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Category::class => CategoryPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*Gate::before(function ($user, $ability)
        {
            if ($user->email == 'email@user.com') {
                return true;
            }

        });*/

        /*Gate::define('update-category', function ($user, $category) {
            return $user->id == $category->user->id ;

        });*/

        /*Gate::after(function($user, $ability, $result, $arguments){
           if(!$result){
               abort(403, 'Acesso não autorizado');
               return redirect()->route('admin.categories.index');
               //return $this->response->view($arguments[0].'::index', compact($arguments[1]));
           }

        });*/

        //
    }
}
