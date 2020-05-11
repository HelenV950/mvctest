<?php
\App\Components\View::render('parts/header.php', ['title' => 'Home Page']);
?>

<div class="container" >
  <div class="row">

    <?php if ($data) : ?>
      <?php foreach ($data as $post) : ?>

        <div class="col-md-4">
          <h2><?php echo $post['title']; ?></h2>
          <p><?php echo substr($post['content'], 0, 250); ?></p>
          <p><a class="btn btn-secondary" href="/post/<?php echo $post['id']; ?>/view" role="button">Viev detals &raquo;</a></p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <hr>

  </div>
</div>


<?php

\App\Components\View::render('parts/footer.php');