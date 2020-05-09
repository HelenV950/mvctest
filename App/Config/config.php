<?php
namespace App\Config;

/**
 * Aplication confifuration
 */
class Config
{
  /**
   * database host
   * @var srting
   */
  const DB_HOST = 'localhost';
  /**
   * database name
   * @var srting
   */
  const DB_NAME = 'mvc';
  /**
   * database user
   * @var srting
   */
  const DB_USER = 'root';
  /**
   * database password
   * @var srting
   */
  const DB_PASSWORD = '';

  const DB_LOG_FILE = ROOT . '\\App\\Logs\\Logger.php';
}

