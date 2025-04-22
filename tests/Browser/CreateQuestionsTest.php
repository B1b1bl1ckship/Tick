<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateQuestionsTest extends DuskTestCase
{
    
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'pattel.milan+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->visit('https://app-staging.tick.com.au/public/questions')

                    ->assertSee('All Questions')
                    ->assertSee('Create new question')
                    ->pause(2000)  
                    ->press('Create new question')
                    ->pause(1000)
                    ->assertPathIs('/public/questions/create')
                    ->assertSee('Create Question')

                    ->type('Title', 'Test Org ') 
                    ->pause(2000)
                    ->type('Description', 'CODE' )
                    ->pause(2000);

        });
    }
}
