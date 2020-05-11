<?php

namespace App\Validators;

use App\Models\User;

class UserValidator
{
  /**
   * @var erray
   */
  protected $errors = [
    // 'name_error'      => 'The name should contain more than 2 letters',
    // 'lastname_error'  => 'The lastname should contain more than 2 letters',
    'nickname_error'  => 'The nickname should contain more than 2 letters',
    'birthday_error'  => 'Birsday date is invalid',
    'email_error'     => 'Email is invalid',
    'password_error'  => 'The password should contain more than 8 letters',
  ];

  /**
   * @var erray
   */
  protected $rules = [
    // 'name'      => '/[A-Za-zА-Яа-я]{2,}/',
    // 'lastname'  => '/[A-Za-zА-Яа-я]{2,}/',
    'nickname'  => '/[A-Za-zА-Яа-я]{2,}/',
    'birthday'  => '/[\d]{4}-[\d]{2}-[\d]{2}/',
    'email'     => '/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/',
    'password'  => '/[a-zA-Z0-9]{8,}/',
  ];

  /**
   * @param array $fields
   * @return bool
   */
  public function storeValidate(array $fields): bool
  {
    foreach ($fields as $key => $field) {
      if (preg_match($this->rules[$key], $field)) {
        unset($this->errors["{$key}_error"]);
      }
    }
    return empty($this->errors) ? true : false;
  }

  /**
   * @param string $email
   * @return bool
   */

  public function checkEmailOnExists(string $email)
  {
    $user = new User();
    if ($user->getUserByEmail($email)) {
      $this->errors = [
        'email_error' => 'User with this email already exists'
      ];
      return true;
    }
    return false;
  }
/**
   * @param string $nickname
   * @return bool
   */
  public function checkNickNameOnExists(string $nickname)
  {
    $user = new User();
    if ($user->getUserByNickName($nickname)) {
      $this->errors = [
        'nick_name_error' => 'User with this nickname already exists'
      ];
      return false;
    }
    return true;
  }

  /**
   * @return array
   */
  public function getErrors()
  {
    return $this->errors;
  }
}
