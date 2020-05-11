<?php
\App\Components\View::render('parts/header.php', ['title' => 'Create Post']);

// if(!empty($_SESSION['data'])){
//   extract($_SESSION['data']);
//   unset($_SESSION['data']);
// }

// $userName = $user->getUserById($id);
// echo $userName['nickname'];

?>



<div class="container">
  <div class="row">

    <div class=" col-10">

      <h1>Create Post Form</h1>
      <form method="POST" action="/post/store" enctype="multipart/form-data">
    

        <div class="form-group">
          <label for="postTitle">Title</label>
          <input type="text" class="form-control" id="postTitle" name="title" placeholder="Post title" value="<?php echo !empty($data['title']) ? $data['title'] : ''; ?>">

          <?php if (!empty($title_error)) : ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $title_error; ?>
            </div>
          <?php endif; ?>

        </div>


        <div class="form-group">
          <label for="postContent">Content</label>
          <textarea class="form-control" name="content" id="postContent" cols="30" rows="10"><?php echo !empty($data['content']) ? $data['content'] : ''; ?></textarea>

          <?php if (!empty($content_error)) : ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $content_error; ?>
            </div>
          <?php endif; ?>
        </div>
      </form>

      <div class="form-group">
        <label for="postImage">Image file input</label>
        <input type="file" class="form-control-file" id="postImage" name="image" value="<?php echo !empty($data['image']) ? $data['image'] : ''; ?>">

        <?php if (!empty($image_error)) : ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $image_error; ?>
          </div>
        <?php endif; ?>

      </div>

      <button type="submit" class="btn btn-secondary">Create post</button>





    </div>
  </div>
</div>




<?php
\App\Components\View::render('parts/footer.php');
