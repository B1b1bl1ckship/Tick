<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SaveOrganizationDataUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
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
                    ->pause(500)
                    ->press('Copy')
                    ->pause(2000)
                    ->press('CSV')
                    ->pause(1000)
                    ->press('Excel')
                    ->pause(1000)
                    ->press('PDF')
                    ->pause(2000)
                    ->assertSee('Your Organisations');
        });
    }
}
