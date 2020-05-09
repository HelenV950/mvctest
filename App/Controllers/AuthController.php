<?php

namespace App\Controllers;

use App\Components\Controller;
use App\Components\View;
use App\Helpers\Session\SessionHelper;
use App\Models\User;

class AuthController extends Controller
{
  public function actionLogin()
  {
    View::render('auth/login.php');
  }

  public function actionRegister()
  {
    View::render('auth/register.php');
    
  }

  public function actionVerity()
  {
    unset($_SESSION['error']['login']['common']);
    $fields = filter_input_array(INPUT_POST, $_POST, 1);

    $user = new User();

    if ($userData = $user->getUserByEmail($fields['email'])){
      if(password_verify($fields['password'], $userData['password'])){
        SessionHelper::setUserData('id', $userData['id']);
        site_redirect('home');
        return;
      } else{
        $_SESSION['error']['login']['common'] = 'The password is not valid';
      }
    } else{
      $_SESSION['error']['login']['common'] = 'The user with email "'. $fields['email'] .'" not exists';
    }
  site_redirect('login');
  }


  public function actionlogout()
  {
    SessionHelper::desroyUserData();
    site_redirect('login');
  }
}
