<?php

namespace Tests\Browser\Testing;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
  /**
   * A Dusk test example.
   *
   * @return void
   */
  public function testLogin()
  {
    $this->browse(function (Browser $browser) {

      // visit page.
      // elements are shown
      $browser->visit(route('login'))
        ->assertTitle('Login')
        ->waitFor('form')
        ->assertPresent('@loginFormInputToken')
        ->assertPresent('@loginFormInputEmail')
        ->assertPresent('@loginFormInputPassword')
        ->assertPresent('@loginFormButtonSubmit')
        ->assertSee('Password');
    });
  }
}
