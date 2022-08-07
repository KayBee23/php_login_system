<?php 

  
if(isset($_POST['submit'])){

  $username = $_POST['username'];
  $password = $_POST['password'];

  require_once'../config/db.php';
  require_once'functions.php';




  if(emptyInputLogin($username,$password) !== false){
    header('location: ../pages/login.php?error=emptyinput');
    exit();
  }

  loginUser($connection,$username,$password);
  
}
else{
  header('location: ../pages/login.php');
  exit();
}