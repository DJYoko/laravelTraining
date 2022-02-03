<?php

// DUSK testing
return [
  'userName' => env('DUSK_TEST_USER_NAME', 'duskTestAccount'),
  'userEmail' => env('DUSK_TEST_USER_EMAIL', 'test@test.com'),
  'userPasswordInput' => env('DUSK_TEST_USER_PASSWORD', 'password'),
];
