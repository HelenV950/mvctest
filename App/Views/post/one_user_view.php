<?php
\App\Components\View::render('post\header', ['title' => $post['title']]);

//echo '<pre>' . print_r($post, true) . '</pre>';
?>

<div class="container" style="margin: 32ps 0;">
  <div class="row">
    <div class="col-12">

    <?php foreach ($posts as $post) {?>
        <div class="well">
            <div class="media">

                <?php if ($post['image'] != ''): ?>
                    <img class="media-object" src="<?php echo ASSETS_URL . $post['image']; ?>" style="max-width: 350px;">
                <?php endif; ?>

                <div class="media-body">
                    <h4 class="media-heading" style="padding: 10px;"><?php echo $post['title']; ?></h4>
                    <p class="text-right">By <strong><a href="/posts/user/<?php echo $user_id; ?>/view"><?php echo $user_name; ?></a></strong></p>
                    <p style="padding: 10px;"><?php echo $post['content']; ?></p>
                    <ul class="list-inline list-unstyled" style="padding: 10px;">
                        <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $post['create_at'];?> </span></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php if (\App\Helpers\Session\SessionHelper::getUserId() == $post['user_id']): ?>
        <div class="float-right">
            <a class="btn btn-warning" href="/post/<?php echo $post['id']?>/edit" role="button">Изменить</a>
            <a class="btn btn-danger" href="/post/<?php echo $post['id']?>/delete" role="button">Удалить</a>
        </div>
        <?php endif; ?>
        <hr>
    <?php }; ?>


      </div>
    </div>
  </div>
  

<?php
\App\Components\View::render('parts/footer.php');