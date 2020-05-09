<?php

namespace App\Components;

/**
 * Base controller
 */

abstract class Controller
{
  protected $validation = true;
  protected $data = [];

  /**
   * @param string name Method name
   * @param array args Arguments passed to the method
   * 
   * @return void
   * @throws \Exseption 
   */

  public function __call($name, $args)
  {
    if (method_exists($this, $name)) {
      if ($this->before() !== false) {
        call_user_func_array([$this, $name], $args);
        $this->after();
      }
    } else {
      throw new \Exception("Method $name not found in Controller" . get_class($this));
    }
  }


  /**
   * Before filter called before an action method
   * @return void
   */

  protected function before()
  {
  }

  /**
   * After filter called after an action method
   * @return void
   */

  protected function after()
  {
  }
}
