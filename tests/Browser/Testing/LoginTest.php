<?php

namespace Tests\Browser\Testing;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Testing\UtilityTrait;
use App\Models\User;


class LoginTest extends DuskTestCase
{
  use UtilityTrait;
  /**
   * @return void
   */
  public function testLoginShowForm()
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
        ->assertPresent('@loginFormButtonSubmit');
    });
  }

  /**
   * @return void
   */
  public function testLoginError()
  {
    $this->browse(function (Browser $browser) {

      // visit page.
      // elements are shown
      $browser->visit(route('login'))
        ->assertTitle('Login')
        ->waitFor('form');

      // Error case (submit without params)
      $browser->press('@loginFormButtonSubmit')->waitFor('@loginPageAlert');
      $browser->assertSee('The email field is required.');
      $browser->assertSee('The password field is required.');
    });
  }

  /**
   * @return void
   */
  public function testLoginSuccess()
  {
    $randomStr = $this->generateRandomString(8);
    $tempMailAddress = $randomStr . '@testDomain.com';

    // create testing user
    User::create([
      'name' => $randomStr,
      'email' => $tempMailAddress,
      'password' => bcrypt('password'),
    ]);

    $this->browse(function (Browser $browser) use ($tempMailAddress) {

      // visit page.
      // elements are shown
      $browser->visit(route('login'))
        ->assertTitle('Login')
        ->waitFor('form');

      // login as testing user
      $browser->value('@loginFormInputEmail', $tempMailAddress);
      $browser->value('@loginFormInputPassword', 'password');
      $browser->press('@loginFormButtonSubmit');

      $url = $browser->driver->getCurrentURL();
      $expectedUrl = route('indexHome');
      $this->assertEquals($expectedUrl, $url);
    });
  }
}
