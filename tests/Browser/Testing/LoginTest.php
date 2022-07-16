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
        ->assertTitle('Login' . ' | ' . config('app.name'))
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
        ->assertTitle('Login' . ' | ' . config('app.name'))
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
    $testUserName = config('testing.userName');
    $testUserEmail = config('testing.userEmail');
    $testUserPasswordInput = config('testing.userPasswordInput');

    $testUser = User::where('users.email', '=', $testUserEmail)->first();
    if (is_null($testUser)) {
      // create testing user
      User::create([
        'name' => $testUserName,
        'email' => $testUserEmail,
        'password' => bcrypt($testUserPasswordInput),
      ]);
    }

    $this->browse(function (Browser $browser) use ($testUserEmail, $testUserPasswordInput) {

      // visit page.
      // elements are shown
      $browser->visit(route('login'))
        ->assertTitle('Login' . ' | ' . config('app.name'))
        ->waitFor('form');

      // login as testing user
      $browser->value('@loginFormInputEmail', $testUserEmail);
      $browser->value('@loginFormInputPassword', $testUserPasswordInput);
      $browser->press('@loginFormButtonSubmit');

      $url = $browser->driver->getCurrentURL();
      $expectedUrl = route('indexHome');
      $this->assertEquals($expectedUrl, $url);
    });
  }
}
