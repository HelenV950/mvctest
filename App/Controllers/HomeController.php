<?php

namespace App\Controllers;

use App\Components\Controller;
use App\Components\View;
use App\Models\Post;

/**
 * Home controler
 */

class HomeController extends Controller
{
  /**
   * show the index page
   * @return void
   * @throws \Exception 
   */

  public function actionIndex()
  {
    $post = new Post();
    $postData= $post->getAllPost();
 

    View::render('home/index.php', ['data' => $postData]);
  }
}
