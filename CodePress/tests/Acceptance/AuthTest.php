<?php
/**
 * Created by PhpStorm.
 * User: sh_ntbk_hp
 * Date: 26/10/16
 * Time: 13:13
 */

use CodePress\CodeUser\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends \TestCase
{

    use DatabaseTransactions;

    protected function createRouteAdmin(){
        Route::group([
            'middleware' => ['web', 'auth']
        ],
        function(){

            Route::get('/admin/test' ,function (){
                return 'admin teste!';
            });

        });
    }

    public function getUser(){
        return User::all()->first();
    }

    public function test_can_login_application(){
        $this
            ->visit('/login')
            ->type('email@user.com.br', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->seePageIs('/home')
            ->see('Dashboard')
        ;
    }
    /*
     *
        ->([

                'name' => 'user', 'email' => 'email@user.com.br', 'password' => bcrypt(123456)
    */
    public function test_cannot_login_application(){
        $this->createRouteAdmin();
        $this
            ->visit('/login')
            ->type('outro@user.com.br', 'email')
            ->type('1234567', 'password')
            ->press('Login')
            ->seePageIs('/login')
            ->see('These credentials do not match our records.')
        ;
    }

    public function test_can_logout_from_application(){
        $this->createRouteAdmin();
        $this
            ->actingAs($this->getUser())
            ->visit('/home')
            ->seePageIs('/home')
            ->see('Dashboard')
            //->visit('/logout')
            //->seePageIs('/login')
            //->visit('/admin/test')
        ;
        $this
            ->actingAs($this->getUser())
            //->visit('/logout')
            //->visit('/admin/test')
            //->seePageIs('/login')
            //->see('password')
            //->seePageIs('/login')
            //->visit('/admin/test')
        ;
    }
    public function test_can_access_route_with_middleware_auth(){
        //dd($this->getUser());
        $this->createRouteAdmin();
        $this
            ->actingAs($this->getUser())
            ->visit('/admin/test')
            ->see('admin teste!')
        ;

    }

}