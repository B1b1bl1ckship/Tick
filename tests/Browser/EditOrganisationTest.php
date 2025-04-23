<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditOrganisationTest extends DuskTestCase
{
    
    public function testEditOrganisationFromAdminDashboard()
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


                    ->visit(config('dusk_urls.organisations'))
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('All Organisations')
                    ->pause(2000)

                    ->clickLink('Test O')
                    ->pause(2000)
                    ->assertPathIs('/organisations/2')
                    ->assertSee('Test O')

                    ->clickLink('Edit this Organisation')
                    ->pause(2000)
                    ->assertSee('Edit Test O')

                    ->press('Save Organisation')
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('All Organisations');
        });
    }
}
