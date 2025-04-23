<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AssignCodesAdminTest extends DuskTestCase
{
    public function testAssignCodesAdmin(): void
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
                    ->visit(config('dusk_urls.organisation_detail'))
                    ->pause(2000)
                    ->assertSee('je')

                    ->clickLink('Assign Code')
                    ->pause(2000)
                    ->assertSee('Assign Codes')

                    ->type('name', 'Gurjeet Singh')
                    ->type('email', 'singhgurjeet966@gmail.com')
                    ->pause(2000)
                    ->press('Assign code')
                    ->pause(2000)
                    ->assertSee('Assigned codes');              
                
        });
    }
}
