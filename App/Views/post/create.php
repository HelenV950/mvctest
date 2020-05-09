<?php
\App\Components\View::render('parts/header.php', ['title' => 'Create Post']);


?>


<form>
    <div class="container">
      <div class="row">
       
         <div class=" col-10">

          <h1>Create Post Form</h1>
          <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" >
          </div>
      
         
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </form>
      
        <div class="form-group">
          <label for="exampleFormControlFile1">Image file input</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
      
        <button type="submit" class="btn btn-secondary">Create post</button>




    
        </div>
      </div>
    </div>
   



      <?php
\App\Components\View::render('parts/footer.php');