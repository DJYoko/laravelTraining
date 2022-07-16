<?php

namespace Tests\Browser\Testing;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Testing\UtilityTrait;

class RegisterTest extends DuskTestCase
{
  use UtilityTrait;
  /**
   * @return void
   */
  public function testRegisterShowForm()
  {
    $this->browse(function (Browser $browser) {

      // visit page.
      // elements are shown
      $browser->visit(route('register'))
        ->assertTitle('Register' . ' | ' . config('app.name'))
        ->waitFor('form')
        ->assertPresent('@registerForm')
        ->assertPresent('@registerFormInputToken')
        ->assertPresent('@registerFormInputName')
        ->assertPresent('@registerFormInputEmail')
        ->assertPresent('@registerFormInputPassword')
        ->assertPresent('@registerFormInputPasswordConfirmation')
        ->assertPresent('@registerFormButtonSubmit');
    });
  }

  /**
   * @return void
   */
  public function testRegisterError()
  {
    $this->browse(function (Browser $browser) {

      // visit page.
      // elements are shown
      $browser->visit(route('register'))
        ->waitFor('form');

      // Error case (submit without params)
      $browser->press('@registerFormButtonSubmit')->waitFor('.alert-danger');
      $browser->assertSee('The name field is required.');
      $browser->assertSee('The email field is required.');
      $browser->assertSee('The password field is required.');
    });
  }

  public function testRegisterSuccess()
  {

    $this->browse(function (Browser $browser) {

      $randomStr = $this->generateRandomString(8);
      $tempMailAddress = $randomStr . '@testDomain.com';

      $browser->visit(route('register'))
        ->waitFor('form');

      $browser->value('@registerFormInputName', $randomStr);
      $browser->value('@registerFormInputEmail', $tempMailAddress);
      $browser->value('@registerFormInputPassword', 'password');
      $browser->value('@registerFormInputPasswordConfirmation', 'password');
      $browser->press('@registerFormButtonSubmit');

      $url = $browser->driver->getCurrentURL();
      $expectedUrl = route('indexHome');
      $this->assertEquals($expectedUrl, $url);
    });
  }
}
