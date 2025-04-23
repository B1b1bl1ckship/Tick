<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewResourcesTest extends DuskTestCase
{
    
    public function testViewResources()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('USER_EMAIL'))
                    ->type('password', env('USER_PASSWORD'))
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')
                    ->pause(2000)

                    ->press('View Resources') 
                    ->pause(2000)


                    ->assertPathIs('/users/resources')
                    ->assertSee('Resources')

                    ->assertSee('PDF1 - Tick Profile Grid Plus – Wall Poster')
                    ->assertSee('PDF2 - Tick Customer Service - Ready Reckoner')

                    ->assertSee('PPT1 - Licensed User PowerPoint Slides - 2018 - V2')
                    ->assertSee('PPT2 - A Cole Videos Exercises')
                    ->assertSee('PPT3 - Tick History - Timeline Slides')

                    ->assertSee('Word1 - Tick Student Workbook 2018')
                    ->assertSee('Word2 - Mentor Mentee Worksheet')
                    ->assertSee('Word3 - Agreement to Sign - October 2018 - template')
                    ->assertSee('Word4 - SESSION PLAN - Tick Licensed User - 2019 - 2 hour session')
                    ->assertSee('Word5 - SESSION PLAN - Tick Licensed User - 2019 - Full day session')
                    ->assertSee('Word6 - Tick Word Documents for Licensed Users')
                    ->assertSee('Word7 - Tick PowerPoint Slides - Commentary - suggested words')
                    ->assertSee('Word8 - A Cole Video Instructions - Commentary - suggested words')

                    ->assertSee('Reflections')
                    ->assertSee('Graphs')
                    ->assertSee('Recognition A')
                    ->assertSee('Recognition B')
                    ->assertSee('Leading')
                    ->assertSee('Sales-Service');
        });
    }
}
