<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class createnewgroupsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testgrouptest(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'pattel.milan+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->visit('https://app-staging.tick.com.au/groups')
                    ->pause(200)

                    ->assertSee('All Groups')
                    ->assertSee('Create new group')
                    ->pause(2000)  
                    ->press('Create new group')
                    ->pause(2000)

                    ->assertPathIs('/groups/create')
                    ->assertSee('Create new group')

                    // ->type('Groups name', 'Test Org ') 
                    // ->pause(2000)
                    // ->type('Pricebook', 'nothingggg' )
                    // ->pause(2000)
                    ->assertSee('Pricebook')
                    ->assertSee('Group Permisions');
                    // ->check('input[value="admin"]')
                    // ->check('input[value="licensed"]')
                    // ->check('input[value="user"]')
                    // ->press('Create new group')

                    // ->assertPathIs('/groups');



        });
    }
}
