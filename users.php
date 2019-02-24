<?php
  include("middleware.php");
  if(!isset($_SESSION['username'])) {
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
          <a class="nav-link text-info highlight">Users</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link highlight" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Container -->
  <div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="highlight mb-3">Panel</h3>
          <table class="table table-bordered border">
            <thead class="thead-light">
              <th class="highlight" scope="col">Username</th>
              <th class="highlight" scope="col">Email</th>
            </thead>
            <tbody>
              <?php
                $query = "SELECT * FROM usuarios";
                $result = mysqli_query($database, $query);

                while($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td class="highlight"><?php echo $row['username'] ?></td>
                    <td class="highlight"><?php echo $row['email'] ?></td>
                  </tr>
                  <?php
                }
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
