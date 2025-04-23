<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditCodesTypeAdminTest extends DuskTestCase
{
    
    public function testEditCodesTypeAdmin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    
                    ->visit(config('dusk_urls.code_types'))                    
                    ->assertSee('All Code Types')
                    ->pause(2000)

                    
                    ->visit(config('dusk_urls.edit_code_type'))                
                    ->assertSee('Edit Code Type')
                                                  
                    ->pause(2000)

                    ->press('Save code tyep')
                    ->pause(2000);
        });
    }
}
