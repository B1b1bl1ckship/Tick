<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class QuestionairesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testselectOrganisations(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'pattel.milan+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    // Navigate to Organisations page after successful login
                    ->visit('https://app-staging.tick.com.au/admin/questionnaires')
                    ->pause(200); // Adjust this URL to you
        });
    }
}
