<?php
  include('middleware.php');

  if(isset($_POST['username'])) {
    $username = $_POST['username'];
  }

  if(isset($_POST['email'])) {
    $email = $_POST['email'];
  }

  if(isset($_POST['password'])) {
    $password = $_POST['password'];
  }

  $username = mysqli_real_escape_string($database, $username);
  $email = mysqli_real_escape_string($database, $email);
  $password = mysqli_real_escape_string($database, $password);
  $errors = FALSE;


  $user_check_query = "SELECT * FROM usuarios WHERE username = '$username' OR email = '$email' LIMIT 1";
  $results = mysqli_query($database, $user_check_query);
  $user = mysqli_fetch_assoc($results);

  if($user) {
    if($user['username'] === $username) {
      $_SESSION['username_error'] = "User is already taken.";
      $errors = TRUE;
      header("location: register.php");
    }
    
    if($user['email'] === $email) {
      $_SESSION['email_error'] = "Email is already taken.";
      $errors = TRUE;
      header("location: register.php");
    }
   }

   if(!$errors) {
      $encrypt_pass = md5($password); // Encrypt password.
      echo "<script>console.log(true)<script>";
      $query = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$encrypt_pass')";
      mysqli_query($database, $query);
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Login sucessfully.";
      header('location: index.php');
   }
   ?>
   