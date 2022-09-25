<?php

namespace Tests\Browser\Testing;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Testing\UtilityTrait;

class CircleTest extends DuskTestCase
{
  use UtilityTrait;
  /**
   * @return void
   */
  public function testCircleShowForm()
  {

    $this->loginAsTestingUser();
    $this->browse(function (Browser $browser) {
      $browser->visit(route('circle.create.input'))
        ->assertTitle('サークル登録' . ' | ' . config('app.name'))
        ->waitFor('form')
        ->assertPresent('@circleCreateFormInputToken')
        ->assertPresent('@circleCreateFormInputName')
        ->assertPresent('@circleCreateFormInputDescription')
        ->assertPresent('@circleCreateFormInputPath')
        ->assertPresent('@circleCreateFormInputImage')
        ->assertPresent('@circleCreateFormButtonSubmit');
    });

    $this->logoutTestingUser();
  }

  public function testCircleCreateFailed()
  {

    $this->loginAsTestingUser();
    $this->browse(function (Browser $browser) {
      $browser->visit(route('circle.create.input'))
        ->assertTitle('サークル登録' . ' | ' . config('app.name'))
        ->waitFor('form');

      $browser->value('@circleCreateFormInputName', '');
      $browser->value('@circleCreateFormInputDescription', '');
      $browser->value('@circleCreateFormInputPath', '');
      $browser->press('@circleCreateFormButtonSubmit');
      $browser->waitFor('@circleCreatePageAlert');
      $browser->assertSee('The Circle Name field is required.');
      $browser->assertSee('The Circle URL field is required.');
    });

    $this->logoutTestingUser();
  }
}
