<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TakequestionnaireTest extends DuskTestCase
{
    
    public function testcreatenewquetionee(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://app-staging.tick.com.au/login')
                    ->type('email', 'pattel.milan+admin@gmail.com')
                    ->type('password', 'fb@$$AC$ign@TURE')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->visit('https://app-staging.tick.com.au/admin/questionnaires')
                    ->assertSee('All Questionnaires')
                    ->assertSee('Create new questionnaire')
                    ->pause(2000)  
                    ->press('Create new questionnaire')
                    ->pause(1000)
                    ->assertPathIs('/admin/questionnaires/create')
                    ->assertSee('Create Questionnaire')
                    ->pause(1000)

                    ->type('title', 'Test Org ') 
                    ->pause(2000)
                    ->type('description', 'nothingggg' )
                    ->pause(2000)
                    ->type('report_template_id', '0')
                    ->press('Create new questionnaire');

        });
    }
}
