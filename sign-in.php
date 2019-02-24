<?php
  include('middleware.php');


  if(isset($_POST['email'])) {
    $email = $_POST['email'];
  }

  if(isset($_POST['password'])) {
    $password= $_POST['password'];
  }

  $email = mysqli_real_escape_string($database, $email);
  $password = mysqli_real_escape_string($database, $password);
  $password = md5($password);

  $query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
  $results = mysqli_query($database, $query);

  if(mysqli_num_rows($results)) {
    $_SESSION['username'] = $email;
    $_SESSION['success'] - "Logged sucessfully";
    header("location: index.php");
  } else {
    $_SESSION['error_credentials'] = "The user or password is incorrect.";
    header("location: login.php");
  }

?>