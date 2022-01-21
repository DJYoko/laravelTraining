<?php

namespace Tests\Browser\Testing;

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
}
