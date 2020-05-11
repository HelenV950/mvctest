<?php

namespace App\Helpers;

use App\Helpers\Session\SessionHelper;

class ImageHelper
{
/**
 * folder for downloading images
 */
  protected $uploadDir = 'images/';
  //ASSETS_PATH

  public function upload(array $image): string
  {

    $userNickName = SessionHelper::getUserNickName();
    $folders      = $this->uploadsDir . "{$userNickName}/";
    $this->createFolders($folders);
    $relativePath = $folders . time() . '-' . basename($image['name']);

    
    if (move_uploaded_file($image['tmp_name'], ASSETS_PATH . $relativePath)) {
      return $relativePath;
    }
    return '';
  }


  public function remove(string $path)
  {
    if(file_exists(ASSETS_PATH . $path)){
      unlink(ASSETS_PATH . $path);
    }
  }

  protected function createFolders(string $path)
  {
    if(!file_exists(ASSETS_PATH . $path)){
      mkdir(ASSETS_PATH . $path, 0755, true);
    }
  }
}
