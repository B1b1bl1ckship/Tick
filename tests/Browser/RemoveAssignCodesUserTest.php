<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RemoveAssignCodesUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testRemoveAssignCodesUser(): void
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

                    ->clickLink('Manage Codes') 
                    ->pause(2000)
                    ->assertSee('je')

                    ->type('input[name="codetype_1"]', '1') 
                    ->pause(1000)

                    ->clickLink('Assign Code')
                    ->pause(2000)
                    ->assertSee('Assign Codes')

                    ->pause(2000)
 
                    ->clickLink('Revoke access'); 
        });
    }
}
