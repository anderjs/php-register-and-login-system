<?php
  session_start();
  if(isset($_SESSION['username'])) {
    header("location: index.php");
  }
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign Up - System Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css" />
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-light highlight" href="#">System Management<a>
    <button 
      class="navbar-toggler" 
      type="button" data-toggle="collapse" 
      data-target="#navbar" 
      aria-controls="navbar" 
      aria-expanded="false" 
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-info highlight" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link highlight" href="register.php">Register</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Container -->
  <div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
      <h3 class="mb-5 highlight">Sign In NOW!</h3>
      <div style="display: none" id="alert" role="alert" class="alert alert-danger w-50 text-center fade-in"></div>
      <!--Register Form -->
      <!-- Row System -->
      <div class="row">
        <div class="col-md-5">
          <form action="sign-in.php" method="POST" id="form-sign-in" class="card p-4">
            <div class="form-group">
              <label class="text-lead text-secondary highlight">Email</label>
              <input type="email" name="email" id="email" class="form-control highlight" required/>
            </div>
            <div class="form-group">
              <label class="text-lead text-secondary highlight" for="#password">Password</label>
              <input type="password" name="password" id="password" class="form-control highlight" required/>
              <div style="cursor: pointer" class="mt-2" id="togglePassword">
                <small class="text-secondary ml-1 mt-2"><i class="far fa-eye mr-2"></i>Show password</small>
                <small class="mt-2 ml-2 text-danger" id="error">
                  <?php
                    if(isset($_SESSION['error_credentials'])) {
                      echo $_SESSION['error_credentials'];
                      unset($_SESSION['error_credentials']);
                    }
                  ?>
                </small>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <input class="btn btn-success btn-sm highlight" type="button" value="Sign In" id="input-sign-in" name="signUp" />
              <input class="btn btn-danger btn-sm ml-2 highlight" type="reset" value="Clear"/>
            </div>
            <p class="text-center mt-2 text-secondary highlight">Don't have an account yet?<a class="ml-2" href="register.php">Sign Up Here</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
<script src="js/login.js"></script>
<script>
  setTimeout(() => {
    document.getElementById('error').innerText = '';
  }, 4000);
</script>
</body>
</html>
