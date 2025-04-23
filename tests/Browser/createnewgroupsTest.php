<?php

namespace Tests\Browser;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class createnewgroupsTest extends DuskTestCase
{
   
    public function testgrouptest(): void
    {
        $this->browse(function (Browser $browser) {
            $faker = Faker::create();
            $randomName = $faker->company;
            $randomPricebook = $faker->numberBetween(1, 100);
            $browser->visit(config('dusk_urls.login'))
                ->type('email', env('ADMIN_EMAIL'))
                ->type('password', env('ADMIN_PASSWORD'))
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Profile')

                    ->visit(config('dusk_urls.groups'))
                    ->pause(200)

                    ->assertSee('All Groups')
                    ->assertSee('Create new group')
                    ->pause(2000)  
                    ->press('Create new group')
                    ->pause(2000)

                    ->assertPathIs('/groups/create')
                    ->assertSee('Create new group')

                    ->type('name', $randomName) 
                    ->pause(2000)
                    ->type('pricebook', $randomPricebook)
                    ->pause(2000)
                    ->assertSee('Pricebook')
                    ->assertSee('Group Permisions')
                    ->check('adminPermissions') 
                    ->check('licensePermissions')
                    ->check('userPermissions')
                    ->press('Create new group')

                    ->assertPathIs('/groups');



        });
    }
}
