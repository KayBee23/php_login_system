<?php


function emptyInputSignup($firstname,$lastname,$email,$username,$password,$re_password){
  $result;
  if(empty($firstname) || empty($lastname) || empty($email)||empty($username) || empty($password)||empty($re_password)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function invalidUsername($username){
  $result;
  if(!preg_match('/^[a-zA-Z0-9]*$/', $username)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function invalidEmail($email){
  $result;
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function passwordMatch($password, $re_password){
  $result;
  if($password !== $re_password){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}
function invalidPassword($password){
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number = preg_match('@[0-9]@', $password);
  $result;
  if(!$uppercase || !$lowercase || !$number || strlen($password) < 8 ){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function usernameExist($connection, $username, $email){
  $query = "SELECT * FROM users WHERE users_user_id = ? OR users_email = ?;";
  $stmt = mysqli_stmt_init($connection);

  if(!mysqli_stmt_prepare($stmt, $query)){
    header('Location: ../pages/sign_up.php?error=stmtfailed');
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if($row = mysqli_fetch_assoc($resultData)){
    return $row;
  }else{
    $result = false;
  }
  return $result;
  mysqli_stmt_close($stmt);
}

function createUser($connection,$firstname,$lastname,$email,$username,$password){
$query = "INSERT INTO users (users_first_name,users_last_name,users_email,users_user_id,users_password) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($connection);
if(!mysqli_stmt_prepare($stmt, $query)){
  header('Location: ../pages/sign_up.php?error=stmtfailed');
  exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, "sssss", $firstname,$lastname,$email,$username,$hashed_password);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location: ../pages/sign_up.php?error=none");
exit();
}

//Login Functions

function emptyInputLogin($username,$password){
  $result;
  if(empty($username) || empty($password)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function loginUser($connection, $username, $password){
  $usernameExist = usernameExist($connection, $username, $username);

  if($usernameExist === false){
    header("location: ../pages/login.php?error=wronglogin");
    exit();
  }

  $password_hashed = $usernameExist['users_password'];
  $checkPassword = password_verify($password, $password_hashed);

  if($checkPassword === false){
    header("location: ../pages/login.php?error=wronglogin");
    exit();
  }elseif($checkPassword === true){
    
    session_start();
    $_SESSION["userid"] = $usernameExist["users_id"];
    $_SESSION["username"] = $usernameExist["users_user_id"];
    header('location: ../pages/index.php');
    exit();
  }

}