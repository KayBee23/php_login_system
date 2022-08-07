<?php include('../inc/header.php') ?>

<div class="container w-50 d-flex flex-column ">
  <?php 
  
  if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
      echo "<div class='card alert alert-warning shadow text-center w-50 mx-auto'>
          <p class='lead my-auto'>Please fill out all fields!</p>
      </div>";
    }elseif($_GET["error"] == "wronglogin"){
      echo "<div class='card alert alert-danger shadow text-center w-50 mx-auto'>
      <p class='lead  my-auto'>Wrong Username/Email or Password</p>
  </div>";
    }
  }
  
  ?>
  <h1 class='text-center mb-4'>Login</h1>
  <form action="../inc/login.inc.php" method="POST">
    <div class=" form-floating mb-3">
      <input class="form-control" type="text" name="username" placeholder="Username/Email...">
      <label>Username/Email...</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" placeholder="Password...">
      <label>Password...</label>
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary w-100">
  </form>
</div>

<?php include('../inc/footer.php') ?>