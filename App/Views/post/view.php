<?php
\App\Components\View::render('post\header', ['title' => $post['title']]);

//echo '<pre>' . print_r($post, true) . '</pre>';
?>

<div class="container" style="margin: 32ps 0;">
  <div class="row">
    <div class="col-12">

      <?php if ($image != '') : ?>
        <img src="<?php echo ASSETS_URL . $image; ?>" width='350'>
      <?php endif; ?>


      <div class="media-body">
        <h4 class="media-heading" style="padding: 10px;"><?php echo $title; ?></h4>
        <p class="text-right">By <strong><a href="/posts/user/<?php echo $user_id; ?>/view"><?php echo $author_name; ?></a></strong></p>
        <p style="padding: 10px;"><?php echo $content; ?></p>
        <ul class="list-inline list-unstyled" style="padding: 10px;">
          <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $create_at; ?> </span></li>
        </ul>
      </div>
    </div>
  </div>
  <?php if (\App\Helpers\Session\SessionHelper::getUserId() == $user_id) : ?>
    <div class="float-right"> 
      <a class="btn btn-warning" href="/post/<?php echo $id ?>/edit" role="button">Изменить</a>
      <a class="btn btn-danger" href="/post/<?php echo $id ?>/delete" role="button">Удалить</a>
    </div>
  <?php endif; ?>
</div>

<?php
\App\Components\View::render('parts/footer.php');
