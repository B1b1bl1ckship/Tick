<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class userviewcartshopTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testusershopviewcart(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')
                    ->assertSee('Purchase More Codes')

                    ->clickLink('Purchase More Codes')
                    ->pause(2000)

                // Assert we're on the correct shop page
                    ->assertPathIs('/shop/category/online-questionnaires')
                    ->assertSee('Shop - Online Questionnaires')

                // Check all expected products are listed
                    ->assertSee('Tick Personality Profile')
                    ->assertSee('Tick Job-fit Profile')
                    ->assertSee('Tick Premium Personality Profile')
                    ->pause(200)
                    ->assertSee('Tick Personality Profile')
                    ->clickLink('Add to Cart') 
                    ->pause(3000)

                // Now we should be on the cart page
                    ->assertPathIs('/shopping/cart')
                    ->assertSee('Your Shopping Cart')
                    ->assertSee('Tick Personality Profile')
                    ->assertSee('AUD $27.50')
                

                // Click on Continue Shopping
                    ->clickLink('Continue Shopping')
                    ->pause(2000)

                // Should land on the main shop page
                    ->assertPathIs('/shop')
                    ->assertSee('Shop - All Products')

                // Validate cart summary still shows the product
                    ->assertSee('Tick Personality Profile');
                    // ->assertSee('Qty 3');

        });
    }
}
