<?php

namespace App\Helpers\Session;

class SessionHelper
{

  /**
   * @return bool
   */
  public static function isUserLoggedIn()
  {
    return !empty($_SESSION['user_data']);
  }

 /**
   * @return mixed
   */
  public static function getUserId()
  {
    return empty($_SESSION['user_data']['id']);
  }

   /**
   * @param $id
   */
  public static function setUserData(string $key, $value)
  {
   $_SESSION['user_data'][$key] = $value;
  }

  public static function desroyUserData()
  {
   session_destroy();
  }
}
