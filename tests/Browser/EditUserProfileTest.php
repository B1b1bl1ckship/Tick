<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditUserProfileTest extends DuskTestCase
{

    public function testEditUserProfile(): void
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

                    ->press('Edit Profile') 
                    ->pause(2000)
                
                    ->assertSee('Edit your profile')
                    ->pause(1000)

                    ->press('Save profile') 
                    ->pause(2000)
                    ->assertPathIs('/dashboard') 
                    ->assertSee('Profile');
        });
    }
}
