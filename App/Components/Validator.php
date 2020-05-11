<?php
namespace App\Components;

 abstract class Validator
{
  /**
   * @var erray
   */
  protected $errors = [];

  /**
   * @var erray
   */
  protected $rules = [];

  /**
   * @return bool
   */
 public function validate(array $request)
{
  foreach ($request as $key => $field) {
    if (preg_match($this->rules['key'], $field)) {
      unset($this->errors["{$key}_error"]);
    }
  }
  return empty($this->errors);
} 

  /**
   * @return array
   */
  public function getErrors()
  {
    return $this->errors;
  }
}
