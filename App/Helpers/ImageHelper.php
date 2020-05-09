<?php

namespace App\Helpers;

use App\Helpers\Session\SessionHelper;

class ImageHelper
{
/**
 * folder for downloading files
 */
  protected $uploadDir = 'images/';
  //ASSETS_URL

  public function upload(array $file): string
  {

    $userId = SessionHelper::getUserId();
    $folders = $this->uploadsDir . "{$userId}/";
    $this->createFolders($folders);
    $relativePath = $folders . time() . '-' . basename($file['name']);

    
    if (move_uploaded_file($file['tmp_name'], ASSETS_URL . $relativePath)) {
      return $relativePath;
    }
    return '';
  }


  public function remove(string $imagePath)
  {
    if(file_exists(ASSETS_URL . $imagePath)){
      unlink(ASSETS_URL . $imagePath);
    }
  }

  protected function createFolders(string $path)
  {
    if(!file_exists(ASSETS_URL . $path)){
      mkdir(ASSETS_URL . $path, 0755, true);
    }
  }
}
