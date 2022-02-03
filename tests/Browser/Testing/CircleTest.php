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

      // visit page.
      // elements are shown
      $browser->visit(route('circle.create.input'))
        ->assertTitle('サークル登録')
        ->waitFor('form')
        ->assertPresent('@circleCreateFormInputToken')
        ->assertPresent('@circleCreateFormInputName')
        ->assertPresent('@circleCreateFormInputDescription')
        ->assertPresent('@circleCreateFormInputPath')
        ->assertPresent('@circleCreateFormInputImage')
        ->assertPresent('@circleCreateFormButtonSubmit');
    });
  }
}
