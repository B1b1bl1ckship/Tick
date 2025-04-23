<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewOrderTest extends DuskTestCase
{
    
    public function testViewOrder(): void
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

                    ->visit(config('dusk_urls.order'))
                    ->assertSee('List of Orders')
                    ->pause(2000)
                    ->press('View')
                    ->pause(2000)
                    ->assertSee('Thank you for your order');


        });
    }
}
