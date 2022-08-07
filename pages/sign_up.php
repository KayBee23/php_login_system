<?php include('../inc/header.php') ?>

<div class="container w-50 d-flex flex-column ">

  <h1 class='text-center mb-4'>Sign Up</h1>
  <?php
if(isset($_GET["error"])){
  if($_GET["error"] == "emptyinput"){
    echo "<div class='card alert alert-warning shadow text-center w-50 mx-auto'>
        <p class='lead my-auto'>Please fill out all fields!</p>
    </div>";
  }elseif($_GET["error"] == "invalidusername"){
    echo "<div class='card alert alert-danger shadow text-center w-50 mx-auto'>
    <p class='lead  my-auto'>Invalid Username!</p>
</div>";
  }elseif($_GET["error"] == "invalidemail"){
    echo "<div class='card alert alert-danger shadow text-center w-50 mx-auto'>
    <p class='lead  my-auto'>Invalid Email!</p>
</div>";
  }elseif($_GET["error"] == "invalidpassword"){
    echo "<div class='card alert alert-danger shadow text-center w-50 mx-auto'>
    <p class='lead  my-auto'>Invalid Password!</p> <br>
    <p class='lead my-auto'>Password must contain at least 1 uppercase letter, 1 lowercase letter, a number and must be 8 characters long</p>
</div>";
  }elseif($_GET["error"] == "notmatchingpassword"){
    echo "<div class='card alert alert-danger shadow text-center w-50 mx-auto'>
    <p class='lead  my-auto'>Passwords does not match!</p>
</div>";
  }elseif($_GET["error"] == "usernametaken"){
    echo "<div class='card alert alert-warning shadow text-center w-50 mx-auto'>
    <p class='lead  my-auto'>Sorry, Username already taken!</p>
</div>";
  }elseif($_GET["error"] == "none"){
    echo "<div class='card alert alert-success shadow text-center w-50 mx-auto'>
    <p class='lead  my-auto'>Sign up was successful!</p>
</div>";
  }
}
?>
  <form action="../inc/signup.inc.php" method="POST">
    <div class=" form-floating mb-3">
      <input class="form-control" type="text" name="firstname" placeholder="First Name">
      <label>First Name...</label>
    </div>
    <div class=" form-floating mb-3">
      <input class="form-control" type="text" name="lastname" placeholder="Last Name...">
      <label>Last Name...</label>
    </div>
    <div class=" form-floating mb-3">
      <input class="form-control" type="email" name="email" placeholder="Email...">
      <label>Email...</label>
    </div>
    <div class=" form-floating mb-3">
      <input class="form-control" type="text" name="username" placeholder="Username...">
      <label>Username...</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" placeholder="Password...">
      <label>Password...</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="re_password" class="form-control" placeholder="Reapeat Password...">
      <label>Repeat Password...</label>
    </div>
    <input type="submit" name="submit" value="Sign Up" class="btn btn-primary w-100">
  </form>
</div>



<?php include('../inc/footer.php') ?>