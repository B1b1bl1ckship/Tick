<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditReportTemplatesTest extends DuskTestCase
{    
    public function testEditReportTemplates(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('dusk_urls.login'))
                    ->type('email', env('ADMIN_EMAIL'))
                    ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->pause(2000)
                    ->assertPathIs('/dashboard')

                    ->visit(config('dusk_urls.report_templates'))
                    ->pause(2000)
                    ->assertSee('All Templates')

                    ->visit(config('dusk_urls.edit_report_template'))
                    ->pause(2000)
                    ->assertSee('Edit Report Template')
                    ->assertInputValue('title', 'Test Template')

                    ->type('description', 'This template was created for Test.')
                    ->pause(1000)

                    ->press('Save report template')
                    ->pause(2000)

                    ->assertPathIs('/report_templates')
                    ->assertSee('Test Template');
        });
    }
}
