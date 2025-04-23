<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminLoginTest extends DuskTestCase
{
    public function testAdminLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                ->type('email', env('ADMIN_EMAIL'))
                ->type('password', env('ADMIN_PASSWORD'))
                ->press('LOG IN')
                ->assertPathIs('/dashboard');
        });;
    }
}
