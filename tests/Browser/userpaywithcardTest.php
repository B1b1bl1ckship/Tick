<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class userpaywithcardTest extends DuskTestCase
{
    
    public function testuserpaywithcard(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'pattel.milan+user@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
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
                    ->assertSee('AUD $62.00')
                    // ->assertSee('Total AUD: $186.00') // Based on Qty 3 as per your description

                    ->clickLink('Checkout')
                    ->pause(2000)
    
                    // On Checkout Page
                    ->assertPathIs('/shopping/cart/checkout')
                    ->assertSee('Checkout')
                    ->assertSee('Billing Info')
                    ->assertSee('Total AUD: $62.00')
                    ->assertSee('Tick Personality Profile')
    
                    // Click Pay with Card
                    ->press('Pay with Card')
                    ->pause(3000);
    
                    


        });
    }
}
