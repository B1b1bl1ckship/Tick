<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserProfileTest extends DuskTestCase
{
    
    public function testUserProfile(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('USER_EMAIL'))
                    ->type('password', env('USER_PASSWORD'))
                    ->press('LOG IN')
                    ->waitForLocation('/dashboard')
                    ->waitForText('Profile')

                    ->assertSee('Profile')
                    ->assertSee('Gurjeet')
                    ->assertSee('Singh')
                    ->assertSee('singhgurjeet966+user@gmail.com')
                    ->assertSee('04000000')
                    ->assertSee('281 Churchill Rd Prospect, Adelaide, SA,');
        });
    }
}
