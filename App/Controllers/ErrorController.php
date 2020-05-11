<?php
namespace App\Controllers;

use App\Components\Controller;

class ErrorController extends Controller
{

    public function error404(){
        echo __CLASS__;
        return;
    }
}