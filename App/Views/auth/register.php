<?php
\App\Components\View::render('parts/header.php', ['title' => 'Create Post']);

// if (!empty($_SESSION['data'])) {
//   extract($_SESSION['data']);
//   unset($_SESSION['data']);
// }
?>



  <div class="container">
    <div class="row">

      <div class=" col-10">
        <h1>Create An Account</h1>
        <form method="POST" action="/user/store">   
          <!-- <div class="form-group">
            <label for="exampleInputFirstName">Name</label>
            <input type="text" 
            class="form-control" 
            id="exampleInputFirstName" 
            name="name"
            placeholder="Name"
            value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>"
            required>
            
         
            <?php if(!empty($name_error)): ?>
                <div class="alert alert-danger" role="alert"> 
                <?php echo $name_error; ?>   
                </div>
                <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="exampleInputLastName">Last Name</label>
            <input type="text" 
            class="form-control" 
            id="exampleInputLastName" 
            name="lastname"
            placeholder="Last name" 
            value="<?php echo !empty($data['lastname']) ? $data['lastname'] : ''; ?>"
            required>

            
            <?php if(!empty($lastname_error)): ?>
                <div class="alert alert-danger" role="alert"> 
                <?php echo $lastname_error; ?>   
                </div>
                <?php endif; ?>
          </div>
          -->

          <div class="form-group">
            <label for="exampleInputNickName">Nick Name</label>
            <input type="text" 
            class="form-control" 
            id="exampleInputNickName" 
            name="nickname"
            placeholder="Nick name"
            value="<?php echo !empty($data['nickname']) ? $data['nickname'] : ''; ?>"
            required>

           
            <?php if(!empty($nickname_error)): ?>
                <div class="alert alert-danger" role="alert"> 
                <?php echo $nickname_error; ?>   
                </div>
                <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="exampleInputBirthday">Birthday</label>
            <input type="date" 
            class="form-control" 
            id="exampleInputBirthday"   
            name="birthday"
            value="<?php echo !empty($data['birthday']) ? $data['birthday'] : ''; ?>"
            required>

        
            <?php if(!empty($birthday_error)): ?>
                <div class="alert alert-danger" role="alert"> 
                <?php echo $birthday_error; ?>   
                </div>
                <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" 
            class="form-control" 
            id="exampleInputEmail1" 
            name="email"
            placeholder="email@email.com"
            value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>"
            required>

          
            <?php if(!empty($email_error)): ?>
                <div class="alert alert-danger" role="alert"> 
                <?php echo $email_error; ?>   
                </div>
                <?php endif; ?>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" 
            class="form-control" 
            id="exampleInputPassword1"
            name="password"
            value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>"
            required>

         
            <?php if(!empty($password_error)): ?>
                <div class="alert alert-danger" role="alert"> 
                <?php echo $password_error; ?>   
                </div>
                <?php endif; ?>
          </div>

       
          <button type="submit" class="btn btn-primary">Create An Account</button>
        </form>

      </div>
    </div>
  </div>


<?php
\App\Components\View::render('parts/footer.php');
