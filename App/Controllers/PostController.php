<?php

namespace App\Controllers;

use App\Components\Controller;
use App\Components\View;
use App\Helper\ImageHelper;
use App\Helpers\ImageHelper as HelpersImageHelper;
use App\Helpers\Session\SessionHelper;
use App\Models\Post;
use App\Models\User;
use App\Validators\Posts\CreatePostValidator;

class PostController extends Controller
{

    public function actionView($id)
    {

        $post = new Post();
        $user = new User();

        $postData = $post->getPostById($id);
        $userName = $user->getUserById($postData['user_id']);

        $postData['author_name'] = $userName['nickname']; 


        View::render('post/view.php', $postData);
    }

    /**
     * @throws \Exception
     */
    public function actionCreate()
    {
        $this->before();
        View::render('post/create.php');
    }

    /**
     * @throws \Exception
     */
    public function actionIndex()
    {
        //print_r(__METHOD__);
        View::render('post/index.php');
    }
    /**
     * 
     * @throws \Exception
     */
    public function actionStore()
    {
        //var_dump($_FILES['image']); die();

        $this->before();

        if ($_FILES['image']['error'] !== 0) {
            $this->data = [
                'data'         => $_POST,
                'imag_error'   => 'The post should contain image'
            ];
            View::render('post/create', $this->data);
            exit();
        }

        $fields = filter_input_array(INPUT_POST, $_POST, 1);
        // echo '<pre>' . print_r($_POST, true) . '</pre>';
        // echo '<pre>' . print_r($_FILES, true) . '</pre>';
        $validator      = new CreatePostValidator();
        $imageHelper    = new ImageHelper();

        if (!$validator->validate($fields)) {
            $_SESSION = $validator->getErrors();
            site_redirect('post/create');
        }

        $imagePath = $imageHelper->upload($_FILES['image']);

        $fields['image'] =  $imagePath;
        $fields['user_id'] = SessionHelper::getUserId();
        $post = new Post();
        $newPost = $post->insert($fields);

        if ($newPost) {
            redirect("/post/$newPost/view");
        } else {
            die('Ошибка при создании новости в бд');
        }


        $this->data['data'] = $fields;
        $this->data += $validator->getErrors();

        View::render('post/create.php', $this->data);
    }



    protected function before()
    {
        parent::before();

        if (!SessionHelper::isUserLoggedIn()) {
            $_SESSION['notification'] = [
                'type'          => 'info',
                'message'       =>  'You should be autorized for this action'
            ];


            redirect('login');
            die();
        }
    }


    public function delete(int $id)
    {

        $post = new Post();
        $postData = $post->getPostById($id);

        if (SessionHelper::getUserId() != $postData['user_id']) {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Для удаления необходимо быть автором'
            ];
            redirect('home');
            exit();
        } else {
            $post->delete($id);
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Запись удалена'
            ];
            unlink(ASSETS_PATH . $postData['image']);
            redirect('home');
            exit();
        }
    }


    public function edit(int $id)
    {

        $post = new Post();
        $postData = $post->getPostById($id);

        if (SessionHelper::getUserId() != $postData['user_id']) {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Для изменения необходимо быть автором'
            ];
            redirect('home');
            exit();
        } else {
            View::render('post/edit.php', $postData);
        }
    }




    public function update($id)
    {
        $this->before();

        $fields         = filter_input_array(INPUT_POST, $_POST, 1);
        $validator      = new CreatePostValidator();

        if ($validator->validate($fields)){

            if($_FILES['image']['error'] == 0) {
                $imageHelper        = new ImageHelper();
                $imagePath          = $imageHelper->upload($_FILES['image']);
                $fields['image']    = $imagePath;
            }
            $fields['id']   = $id;
            $post           = new Post();
            $updatePost     = $post->update($fields);

            if ($updatePost){
                redirect("/post/$id/view");
            } else {
                die('Ошибка при обновлении новости в бд');
            }
        }

        $this->data['data'] = $fields;
        $this->data += $validator->getErrors();

        View::render("post/$id/edit.php", $this->data);

    }

       

    }



