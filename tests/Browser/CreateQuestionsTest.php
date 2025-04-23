<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateQuestionsTest extends DuskTestCase
{
    public function testcreatequestionnn(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                ->type('email', env('ADMIN_EMAIL'))
                ->type('password', env('ADMIN_PASSWORD'))
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->assertSee('Profile')

                ->visit(config('dusk_urls.public_questions'))
                ->assertSee('All Questions')
                ->assertSee('Create new question')
                ->pause(2000)
                ->press('Create new question')
                ->pause(1000)
                ->assertPathIs('/public/questions/create')
                ->assertSee('Create Question')

                ->type('title', 'Test Org') 
                ->pause(2000)

                // Handle the rich text editor for Description
                ->withinFrame('#description_ifr', function ($browser) {
                    $browser->type('#tinymce', 'CODE'); // Target the TinyMCE editor inside the iframe
                })
                ->pause(2000)

                // Handle the dropdown for Personality
                ->select('questionnaire_id', '1') // Select the option with value="1" (Personality)
                ->pause(1000)

                // Handle the checkboxes
                ->check('special_question') // Check the "special_question" checkbox
                ->check('active_question') // Check the "active_question" checkbox
                ->pause(2000)

                // Press the "Create new question" submit button
                ->press('Create new question') // Target the button by its value attribute
                ->pause(2000)

                // Assert that the question was successfully created
                ->assertPathIs('/questions');
        });
    }
}