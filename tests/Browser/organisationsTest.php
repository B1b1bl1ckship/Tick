<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class organisationsTest extends DuskTestCase
{
    
    public function testLoginAndCheckOrganisations(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')
                    ->pause(1000)
                    // Navigate to Organisations page after successful login
                    ->visit(config('dusk_urls.organisations'))
                    ->pause(2000)
                    ->assertPathIs('/organisations')
                    ->assertSee('All Organisations')
                    ->pause(2000) 
                    ->clickLink('Create new Organisation')
                    ->pause(2000)
                    ->assertPathIs('/organisations/create')
                    ->assertSee('Create Organisation')


                    ->type('name', 'Test Org ') // Fill in a unique name
                    ->pause(2000)
                    ->type('organisation_code', 'CODE' . rand(100, 999))
                    ->pause(2000)
                    
                    ->type('cobranded_wording', 'Test Wording') // Example additional text
                    ->check('active_organisation') // Check if it's a checkbox
                    ->select('parent_organisation', '1') // Assuming '1' is a valid option
                    ->press('Create new Organisation') // Press to submit the form
                    ->assertPathIs('/organisations') // Check if redirected back to organisations list
                     ->assertSee('Test Org')
                     ->pause(4000)
                     ->type('[type="search"]', 'Test Org')
                     ->keys('[type="search"]', '{enter}') 
                     ->pause(3000)

                     ->assertSeeIn('table tbody', 'Test Org');
                    // Check for a part of the newly created organisation name
                        });
                    }
                    
                }
