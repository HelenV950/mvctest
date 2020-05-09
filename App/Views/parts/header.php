<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo !empty($title) ? $title : 'Site'; ?></title>


<?php  if(!empty($title)): ?>
  <title><?php echo $title; ?></title>
<?php endif; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>

<body>
<main>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="/">MySite</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">

      <?php if(\App\Helpers\Session\SessionHelper::isUserLoggedIn()): ?>
      <li class="nav-item">
        <a class="nav-link" href="/logout">logout</a>
      </li>
      <?php else: ?>

      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/registration">Registration</a>
      </li>
      <?php endif; ?>

      <li class="nav-item">
        <a class="nav-link disabled" href="#">|</a>
      </li>
      <?php if(\App\Helpers\Session\SessionHelper::isUserLoggedIn()): ?>
        <li class="nav-item">
        <a class="nav-link disabled" href="/post">Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="/post/create">Create Post</a>
      </li>
      <?php endif; ?>
      
    </ul>
  </div>
</nav>