<?php
\App\Components\View::render('post\header', ['title' => $post['title']]);

//echo '<pre>' . print_r($post, true) . '</pre>';
?>



<?php
\App\Components\View::render('parts/footer.php');