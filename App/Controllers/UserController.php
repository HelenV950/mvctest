<?php
namespace App\Controllers;

use App\Components\Controller;
use App\Components\View;
use App\Validators\UserValidator;
use App\Models\User;

class UserController extends Controller
{
/**
 * creat new User
 */

 public function actionStore()
 {
   $fields = filter_input_array(INPUT_POST, $_POST, 1);
   $userValidate = new UserValidator();

   if($userValidate->storeValidate($fields) && !$userValidate->checkEmailOnExists($fields['email']) && $userValidate->checkNickNameOnExists($fields['nickname'])) {
      $user = new User();
      $newUser = $user->create ($fields);
     
      if($newUser){
        site_redirect('login');
      } else{
        die("500 - Oooops, smth went wrong");
      }
   }
   $this->data['data'] = $fields;
   $this->data += $userValidate->getErrors();

   View::render('auth/register.php', $this->data);
 }
}