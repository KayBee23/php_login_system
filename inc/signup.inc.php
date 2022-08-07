<?php 



if(isset($_POST['submit'])){

  $firstname =htmlspecialchars( $_POST['firstname']); 
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = preg_replace('/\s/','',$_POST['password']);
  $re_password = $_POST['re_password'];

  require_once'../config/db.php';
  require_once'functions.php';


  if(emptyInputSignup($firstname,$lastname,$email,$username,$password,$re_password) !== false){
    header('Location: ../pages/sign_up.php?error=emptyinput');
    exit();
  }
  if(invalidUsername($username) !== false){
    header('Location: ../pages/sign_up.php?error=invalidusername');
    exit();
  }
  if(invalidEmail($email) !== false){
    header('Location: ../pages/sign_up.php?error=invalidemail');
    exit();
  
  }
  if(invalidPassword($password) !== false){
    header('Location: ../pages/sign_up.php?error=invalidpassword');
    exit();
  }
  if(passwordMatch($password,$re_password) !== false){
    header('Location: ../pages/sign_up.php?error=notmatchingpassword');
    exit();
  }
  if(usernameExist($connection,$username, $email) !== false){
    header('Location: ../pages/sign_up.php?error=usernametaken');
    exit();
  }

  createUser($connection, $firstname,$lastname,$email,$username,$password);

}else{
  header("location: ../pages/login.php");
  exit();
}