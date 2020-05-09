<?php
namespace App\Validators\Posts;

use App\Components\Validator;

class CreatePostValidator extends Validator
{
 /**
   * @var erray
   */
  protected $errors = [
    'title_error' => 'The title should contain more than 5 letters',
    'content_error' => 'The should not be empty',
   
     ];

  /**
   * @var erray
   */
  protected $rules = [
    'title' => '/[A-Za-zА-Яа-я]{5,}/',
    'content' => '/[A-Za-zА-Яа-я]{1,}/',
   
  ];


}