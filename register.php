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
          <a class="nav-link highlight" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Container -->
  <div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
      <div style="display: none" id="alert" role="alert" class="alert alert-danger w-50 text-center fade-in"></div>
      <h3 class="mb-5 highlight">Welcome! Register for free now!</h3>
      <!--Register Form -->
      <!-- Row System -->
      <div class="row">
        <div class="col-md-5">
          <form autocomplete="off" method="POST" id="form-sign-up" class="card p-4">
            <div class="form-group">
              <label class="text-lead text-secondary highlight" for="#username">Username</label>
              <input 
                type="text" 
                name="username" 
                id="username" 
                class="form-control"
                autocomplete="off"
                required
                />
              <small class="text-danger ml-2" id="usernameError">
                <?php
                  if(isset($_SESSION['username_error'])) {
                    echo $_SESSION['username_error'];
                    unset($_SESSION['username_error']);
                  }
                ?>
              </small>
            </div>
            <div class="form-group">
              <label class="text-lead text-secondary highlight">Email</label>
              <input type="email" name="email" id="email" class="form-control highlight" required/>
              <small class="text-danger ml-2" id="emailError">
                <?php
                  if(isset($_SESSION['email_error'])) {
                    echo $_SESSION['email_error'];
                    unset($_SESSION['email_error']);
                  }
                ?>
              </small>
            </div>
            <div class="form-group">
              <label class="text-lead text-secondary highlight" for="#password">Password</label>
              <input 
                type="password" 
                name="password" 
                id="password" 
                class="form-control highlight" 
                required
                autocomplete="off"
                />
            </div>
            <div class="d-flex justify-content-center">
              <input 
                class="btn btn-success btn-sm highlight" 
                type="button" 
                value="Sign Up" 
                id="input-sign-up" 
                name="signUp" 
                />
              <input class="btn btn-danger btn-sm ml-2 highlight" type="button" value="Clear" required/>
            </div>
            <p class="text-center mt-2 text-secondary highlight">Already a user?<a class="ml-2" href="login.php">Log In</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
<script src="js/register.js"></script>
<script>
  setTimeout(() => {
    document.getElementById('errorUsername').innerText = '';
    document.getElementById('errorEmail').innerText = '';
  }, 4000);
</script>
</body>
</html>