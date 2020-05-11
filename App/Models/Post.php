<?php
namespace App\Models;

use PDO;

class Post extends \App\Components\Model
{
  /**
   * Post consrtructor
   */

  protected $tableName = 'posts';

  public function __construct()
  {
    $this->getDB();
  }

  /**
   * Get all users as associative array
   * 
   * @param array $fields
   * @return string
   */
  public function insert(array $fields)
  {
    $fields['create_at'] = date('Y-m-d H:i:s');
    $sql = "INSERT INTO $this->tableName (nickname, title, content, image, create_at) VALUES (:nickname, :title, :content, :image, :create_at)";
    $sth = $this->db->prepare($sql);
    $sth->execute($fields);

    return $this->db->lastInsertId();
  }



  /**
   * @param int $id
   * @return bool
   */
  public function getPostById(int $id)
  {
    $sql = "SELECT * FROM $this->tableName WHERE id=:id";
    $sth = $this->db->prepare($sql);
    $sth->execute([':id' => $id]);
    $post = $sth->fetch(PDO::FETCH_ASSOC);

    return !empty($post) ? $post : false;
  }


  public function getAllPost()
  {
    $sql = "SELECT * FROM $this->tableName ORDER BY id";
    $sth = $this->db->prepare($sql);
    $sth->execute();
    $post = $sth->fetch(PDO::FETCH_ASSOC);

    return !empty($post) ? $post : false;
  }

  /**
   * @param int $id
   * @return bool
   */
  public function getPostByNickName(string $nickname)
  {
    $sql = "SELECT * FROM $this->tableName WHERE nickname = :nickname";
    $sth = $this->db->prepare($sql);
    $sth->execute([':nickname' => $nickname]);
    $post = $sth->fetch(PDO::FETCH_ASSOC);

    return !empty($post) ? $post : false;
  }

  public function delete(int $id)
  {
      $sql = "DELETE FROM $this->tableName WHERE  id = :id";
      $sth = $this->db->prepare($sql);
      $sth->execute([':id' => $id]);

      return;
  }

  public function update(array $fields)
  {
      $img = isset($fields['image']) ? ', image=:image' : '';

      $sql = "UPDATE $this->tableName SET title=:title, content=:content $img  WHERE id=:id";

      $sth = $this->db->prepare($sql);
      $result = $sth->execute($fields);

      return $result;
  }

  public function selectPostByUserId(int $user_id)
  {
      $sql = "SELECT * FROM $this->tableName WHERE  user_id = :user_id";
      $sth = $this->db->prepare($sql);
      $sth->execute([':user_id' => $user_id]);
      $post = $sth->fetchAll(PDO::FETCH_ASSOC);

      return !empty($post) ? $post : false;
  }

}
