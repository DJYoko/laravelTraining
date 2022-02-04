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
      User::create([
        'name' => $testUserName,
        'email' => $testUserEmail,
        'password' => bcrypt($testUserPasswordInput),
      ]);
    }

    $this->browse(function (Browser $browser) use ($testUserEmail, $testUserPasswordInput) {
      $browser->visit(route('login'))
        ->waitFor('form');

      $browser->value('@loginFormInputEmail', $testUserEmail);
      $browser->value('@loginFormInputPassword', $testUserPasswordInput);
      $browser->press('@loginFormButtonSubmit');
    });
  }

  public function logoutTestingUser()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit(route('logout'));
    });
  }
}
