<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SaveOrganizationDataAdminTest extends DuskTestCase
{
    public function testSaveOrganizationDataAdmin(): void
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
                    ->assertSee('All Organisations')
                    ->pause(500)
                    ->press('Copy')
                    ->pause(2000)
                    ->press('CSV')
                    ->pause(1000)
                    ->press('Excel')
                    ->pause(1000)
                    ->press('PDF')
                    ->pause(2000)
                    ->assertSee('All Organisations');
        });
    }
}
