<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function Laravel\Prompts\pause;

class QuestionairesTest extends DuskTestCase
{
    
    public function testcreatequestion(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                ->type('email', env('ADMIN_EMAIL'))
                ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    // Navigate to Organisations page after successful login
                    ->visit(config('dusk_urls.admin_questionnaires'))
                    ->pause(2000) 
                    ->visit(config('dusk_urls.Create_questionnaires')) // Click the link or button
                    ->pause(2000)
                    // Fill out the form fields
                    ->type('title', 'Test Questionnaire') 
                    ->pause(100)// Fill in the Title field
                    ->type('description', 'This is a test description.')
                    ->pause(500) 
                    // ->type('questionnaire_type', '1') 
                    // ->pause(50)// 
                    ->type('report_template_id', '12345') // Fill in the Report Template ID field
                    ->pause(1000)

                    // Press the "Create new questionnaire" button
                    ->press('Create new questionnaire') // Submit the form
                    ->pause(2000)

                    // Verify the form submission was successful
                    ->assertPathIs('/questionnaires'); 




        });
    }
}
