<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditOrganisationUserTest extends DuskTestCase
{
    
    public function testEditOrganisationUser(): void
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
                    
                    ->press('Manage')
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('Your Organisations')
                    ->pause(2000)
                    
                    ->clickLink('je') 
                    ->pause(2000)
                    ->assertSee('je')

                    ->clickLink('Edit this Organisation') 
                    ->pause(2000)
                    ->assertSee('Edit je')

                    ->press('Save Organisation')
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('Your Organisations');
        });
    }
}
