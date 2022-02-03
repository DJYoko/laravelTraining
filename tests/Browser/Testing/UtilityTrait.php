<?php

namespace Tests\Browser\Testing;

use App\Models\User;
use Laravel\Dusk\Browser;

trait UtilityTrait
{
  /**
   * レスポンスHTML から改行コード・タグ間スペース文字連続を撤去
   */
  public function generateRandomString(Int $length)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  public function loginAsTestingUser()
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
        ->assertTitle('Login')
        ->waitFor('form');

      // login as testing user
      $browser->value('@loginFormInputEmail', $testUserEmail);
      $browser->value('@loginFormInputPassword', $testUserPasswordInput);
      $browser->press('@loginFormButtonSubmit');
    });
  }
}
