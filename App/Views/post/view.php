<?php
\App\Components\View::render('post\header', ['title' => $post['title']]);

//echo '<pre>' . print_r($post, true) . '</pre>';
?>

<div class="container" style="margin: 32ps 0;">
  <div class="row">
    <div class="col-12">
      <img src="<?php echo ASSETS_URL . $post['image']; ?>" alt="<?php echo $post['title']; ?>" width='350'>
    </div>
    <div class="col-12">
      <h2><?php echo $post['title']; ?></h2>
    </div>

    <?php if ($user) : ?>
      <div class="col-12">
        <small>Autor: <?php echo $user['name'] . '' . $user['lastname']; ?> </small>
      </div>
    <?php endif; ?>

    <hr>
    <div class="col-12"><?php echo $post['content']; ?></div>
  </div>
</div>

<?php
\App\Components\View::render('parts/footer.php');