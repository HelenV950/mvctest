<?php
\App\Components\View::render('parts/header.php', ['title' => 'Create Post']);
?>


  
    <div class="container">
      <div class="row">
       
         <div class=" col-10">
          <h1>Login Page</h1>

          <?php if(!empty($_SESSION['errors']['Login']['common'])): ?>
            <div class="alert alert-danger" role="alert">
          <?php  echo $_SESSION['errors']['Login']['common']; ?>
            </div>
          <?php endif; ?>

          <form method="POST" action="/auth">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" 
              class="form-control" 
              id="exampleInputEmail1" 
              name="email"
              placeholder="email@email.com"
              value="<?php echo !empty($data['email']) ? $data['email']: ''; ?> "
              required>
              </div>

              <?php if(!empty($email_error)): ?>
                <div class="alert alert-danger" role="alert"> 
                <?php echo $email_error; ?>   
                </div>
                <?php endif; ?>


            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" 
              class="form-control" 
              id="exampleInputPassword1"
              name="password"
              value ="<?php echo !empty($data['password']) ? $data['password']: ''; ?> "
              required>
            </div>
            

            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>

            <button type="submit" class="btn btn-primary">Autorize</button>
          </form>


          <?php
        \App\Components\View::render('parts/footer.php');