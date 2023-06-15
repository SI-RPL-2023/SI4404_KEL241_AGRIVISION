<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RequestFoodTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group request
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Agri Vision')->clickLink('Login')
                    ->type('email', 'yaya@arjasari.co.id')
                    ->type('password', 'password')
                    ->press('Log In')
                    ->press('Periksa Request Pembuatan Pasar Daerah')
                    ->pause(5000);
        });
    }
}
