<?php

namespace App\Controllers;

use App\Components\Controller;
use App\Components\View;

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
    View::render('home/index.php');
  }
}
