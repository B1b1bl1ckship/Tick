<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class organisationsselectTest extends DuskTestCase
{
   
    public function testselectOrganisations(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                ->type('email', env('ADMIN_EMAIL'))
                ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    // Navigate to Organisations page after successful login
                    ->visit(config('dusk_urls.organisations'))
                    ->pause(100) 
                      
                    ->assertSee('All Organisations')
                    ->assertSeeIn('table tbody', 'Test Org')
                    ->clicklink('Manage Codes')
                    // ->assertPathIs('/organisations/')
                    ->assertSee('Organisation Name')
                    ->assertSee('Code type')
                    ->assertSee('Available')
                    ->assertSee('Allocated')
                    ->assertSee('Assigned')
                    ->assertSee('Used')
                    ->assertSee('Total')
                    ->assertSee('Actions')
                    ->pause('4000')

                    //edit functinality

                    ->clicklink(' Edit')
                    ->type('name', 'Test Ooo ') // Fill in a unique name
                    ->pause(2000)
                    // ->type('organisation_code', 'CODE' . rand(100, 999))
                    // ->pause(2000)
                    // ->attach('organisation_logo', __DIR__.'/path/to/logo.png') // Specify path to a logo file
                    ->type('cobranded_wording', 'Test edited') // Example additional text
                    // ->check('active_organisation') // Check if it's a checkbox
                    // ->select('parent_organisation', '1') // Assuming '1' is a valid option
                    ->press('Save Organisation') // Press to submit the form
                    ->assertPathIs('/organisations')


                    //Archive functionality

                    ->clicklink('Archive')
                    ->waitForText('Are you sure you want to do this?');
                    $browser->acceptDialog();


                    
                        });
                    }
                    
                }