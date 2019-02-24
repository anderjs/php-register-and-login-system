<?php
  session_start();

  if(!isset($_SESSION['username'])) {
    $_SESSION['message'] = 'You must log in first to view this page';
    echo "Hello world";
    header('location: register.php');
  }

  if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: register.php');
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
          <a class="nav-link text-info highlight" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link higlight" href="users.php">Users</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Container -->
  <div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
       <?php if(isset($_SESSION['username'])) : ?>
        <h3 class="highlight">Welcome <?php echo $_SESSION['username']; ?></h3>
        <a class="btn btn-danger btn-sm" href="index.php?logout='1'">Log out</a>
      <?php endif ?> 
    </div>
  </div>
</body>
</html>