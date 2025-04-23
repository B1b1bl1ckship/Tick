<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class shopallproductTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testAdminshopviewallproduct(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                ->type('email', env('ADMIN_EMAIL'))
                ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')
                    ->assertSee('Purchase More Codes')

                // Click "Purchase More Codes" to go to shop
                ->clickLink('Purchase More Codes')
                ->pause(2000)

                // Assert we're on the correct shop page
                ->assertPathIs('/shop/category/online-questionnaires')
                ->assertSee('Shop - Online Questionnaires')

                // Check all expected products are listed
                ->assertSee('Tick Personality Profile')
                ->assertSee('Tick Job-fit Profile')
                ->assertSee('Tick Premium Personality Profile');

                // ->screenshot('shop-products-listing');
        });
    }
}
