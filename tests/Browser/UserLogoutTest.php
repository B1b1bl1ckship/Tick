<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserLogoutTest extends DuskTestCase
{
    
    public function testUserLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('USER_EMAIL'))
                    ->type('password', env('USER_PASSWORD'))
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')
                    ->pause(2000)

                    ->press('Logout')
                    ->pause(2000)

                    ->assertPathIs('/login')
                    ->assertSee('Existing User - Login');
        });
    }
}
