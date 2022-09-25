<?php

namespace App\Http\Request\Circle;

use Illuminate\Foundation\Http\FormRequest;

class CircleCreateRequest extends FormRequest
{

  /**
   * @return array
   */
  public function rules()
  {
    return [
      'circleName' => ['required', 'max:255'],
      'circlePath' => ['required', 'max:255'],
    ];
  }
}
