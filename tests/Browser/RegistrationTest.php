<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class RegistrationTest extends DuskTestCase
{
    /**
     * Test that a new user can register.
     *
     * @return void
     */
    public function testUserCanRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Test User')
                    ->type('email', 'testuser@example.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('Register')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Dashboard') // Adapt this expected text based on what appears on your dashboard
                    ->assertAuthenticated();
        });

        // Clean up - Ensure the test user is deleted after test run
        User::where('email', 'testuser@example.com')->delete();
    }
}
