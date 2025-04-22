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
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'pattel.milan+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->visit('https://app-staging.tick.com.au/dashboard')
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
