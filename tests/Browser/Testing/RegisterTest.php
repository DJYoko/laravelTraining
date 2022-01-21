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
        ->assertTitle('Register')
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
}
