<?php

namespace App\Controllers;

use App\Components\View;
use App\Models\Post;



class PostController
{

    public function actionView($category, $id)
    {

        if ($id) {
            $postItem = Post::getPostItemById($id);

            echo '<pre>' . print_r($postItem, true) . '</pre>';
            //echo $PostItem;
        }

        echo 'просмотр одной новости';

        return true;

        // $user = $userModal->getUserById($post['user_id']);

        // View::render('post/show.php', ['post' => $post], ['user' => $user]);
    }


    public function actionCreate()
    {

        // $postForm = Post::getPostForm();

        // echo '<pre>' . print_r($postForm, true) . '</pre>';

        // echo 'coздать пост';

       // return true;

        View::render('post/create.php');
    }


    public function actionIndex()
    {
        $postList = [];
        $postList = Post::getPostList();

        echo '<pre>' . print_r($postList, true) . '</pre>';
        echo 'список новостей';
        return true;

       View::render('post/index.php');
    }
}
