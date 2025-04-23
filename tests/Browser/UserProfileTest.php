<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function Laravel\Prompts\pause;

class UserProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testLoginAndLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->visit(config('dusk_urls.dashboard'))
                    ->waitForText('Profile')

                    ->assertSee('Profile')
                    ->assertSee('Milan')
                    ->assertSee('Pattel')
                    ->assertSee('04000000')
                    ->assertSee('281 Churchill Rd Prospect, 70 Light Square,') 
                    ->pause(2000)                    


                    ->press('Logout') // or ->click('@logoutButton') if dusk attribute used
                    ->waitForLocation('/login') // Assuming the user is redirected to the login page after logout
                    ->assertSee('Existing User - Login'); 


        });
    }
}
