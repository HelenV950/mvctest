<?php
namespace App\Components;

class View
{
  protected static $viewPath = '/App/Views/';

  /**
   * Render a view file
   * 
   * @param string $view
   * @param array $args Associative array off data to display in the view
   * 
   * @return void
   * @throws \Exception
   */

  public static function render($view, $args = [])
  {
    extract($args, EXTR_SKIP);
   
    $file = ROOT . static::$viewPath . $view ;
    //echo $file;
    if (is_readable($file)) {
      require $file;
    } else {
      throw new \Exception("$file not found");
    }
  }
}
