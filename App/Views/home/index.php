<?php
\App\Components\View::render('parts/header.php', ['title' => 'Home Page']);
?>

<div class="container" >
  <div class="row">

    <?php if (!empty($posts)) : ?>
      <?php foreach ($posts as $post) : ?>

        <div class="col-md-4">
          <h2><?php echo $post['title']; ?></h2>
          <p><?php echo substr($post['content'], 0, 150); ?></p>
          <p><a class="btn btn-secondary" href="<?php echo SITE_URL . '/posts/' . $post['id']; ?>" role="button">Viev detals &raquo;</a></p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <hr>

  </div>
</div>


<?php

\App\Components\View::render('parts/footer.php');