<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminLogoutTest extends DuskTestCase
{
    public function testAdminLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
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
