<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RemoveAssignCodesAdminTest extends DuskTestCase
{
    
    public function testRemoveAssignCodesAdmin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->visit(config('dusk_urls.organisations'))
                    ->pause(200)
                    ->visit(config('dusk_urls.organisation_detail'))
                    ->pause(200)
                    ->assertPathIs('/organisations/9')
                    ->assertSee('je')

                    ->clickLink('Assign Code')
                    ->pause(2000)
                    ->assertPathBeginsWith('/code/1/organisation/9')
                    ->assertSee('Assign Codes')
                    ->clickLink('Revoke access');
        });
    }
}
