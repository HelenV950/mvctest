<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 */

class User extends \App\Components\Model
{
  /**
   * @var string
   */
  protected $tablename = 'users';

  /**
   * User constructor
   */
  public function __construct()
  {
    $this->getDB();
  }

  /**
   * @param array $fields
   * @return mixed
   */
  public function create(array $fields)
  {
  $sql = "INSERT INTO {$this->tablename}(name, lastname, nickname, birthday, email, password) VALUES (:name, :lastname, :nickname, :birthday, :email, :password)";
  $fields['password'] = password_hash($fields['password'], PASSWORD_DEFAULT);
  $sth = $this->db->prepare($sql);
  $sth->execute($fields);
  return $this->db->lastInsertId();
  }

  public function getUserByEmail(string $email)
  {
  $sql = "SELECT * FROM {$this->tablename} WHERE email=:email";
  $sth = $this->db->prepare($sql);
  $sth->execute([':email' => $email]);
  $user = $sth->fetch(PDO::FETCH_ASSOC);

  return !empty($user) ? $user : false;
  }

  public function getUserByNickName(string $nickname)
  {
  $sql = "SELECT * FROM {$this->tablename} WHERE nickname=:nickname";
  $sth = $this->db->prepare($sql);
  $sth->execute([':nickname' => $nickname]);
  $user = $sth->fetch(PDO::FETCH_ASSOC);

    return ($user == false) ? $user : false;
  }

  public function getUserById(int $id)
  {
  $sql = "SELECT * FROM {$this->tablename} WHERE id=:id";
  $sth = $this->db->prepare($sql);
  $sth->execute([':id' => $id]);
  $user = $sth->fetch(PDO::FETCH_ASSOC);

  return !empty($user) ? $user : false;
  }

}
