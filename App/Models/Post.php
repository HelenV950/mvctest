<?php
namespace App\Models;


class Post
{
  /**
   * Return single Post item with specified id
   * @param int $id
   */


  public static function getPostItemById($id)
  {
    //запрос в базу данных
    $postItem = 'НОВОСТЬ';
    return $postItem;

  }


  /**
   * Return an array of Post items
   */

  public static function getPostList()
  {
    //запрос в базу данных

    // $pdo = new PDO('mysql:host=localhost;dbname=mvc_test', "root", '');

    // $PostList = array();
    // $result = $pdo->query('SELEST id, title, data, shot_content FROM Post ORDER BY date DESC LIMIT 10');

    $postList ='МНОГО НОВОСТЕЙ';

    // $i = 0;

    // while ($row = $result->fetch()) {
    //   $PostList[$i]['id'] = $row['id'];
    //   $PostList[$i]['title'] = $row['title'];
    //   $PostList[$i]['date'] = $row['date'];
    //   $PostList[$i]['shot_content'] = $row['shot_content'];
    //   $i++;
    // }
    return $postList;
  }

  public static function getPostForm()
  {
    //запрос в базу данных
    $postForm = 'СОЗДАТЬ ПОСТ';
    return $postForm;

  }
}
