<?php
namespace App\Config\routes;


return array(
   'post/([a-z]+:[0-9]+)/([0-9]+)'  => 'post/view/$1/$2',
   'post'                    => 'post/index',
   'post/create'             => 'post/create/',
   'post/store'              => 'post/store',
  
   ''                        => 'home/index',
  'home'                     => 'home/index',

  'login'                   => 'auth/login',
  'registration'            => 'auth/register',
  'auth'                    => 'auth/auth',
  'logout'                  => 'auth/logout',

  'user/store'              => 'user/store',

 // 'post/{id:\id+}'          => 'post/show/$1/$2',
 
  'post/{([a-z]+):([^\}]+)\}}'      => 'post/show/?P<\1>\2',

 //'/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)'
 
);
