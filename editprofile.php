<?php

// Import accounts functionality.
require_once "accounts.php";

// Grab user based on URL.
$user = getUserByUsername($_GET['user']);

// Get logged in user if there is one.
session_start();
if (isset($_SESSION['loggedinuser'])) {
  $loggedInUser = getUserByUsername($_SESSION['loggedinuser']);
} else {
  $loggedInUser = null;
}

// Must be logged in.
if ($loggedInUser === null) {
	header("Location: /");
	die();
}

// TODO: Patch here to disalllow editing of other user's profiles.
// if ($user["username"] !== $loggedInUser["username"]) {
// 	header("Location: editprofile.php?user=" . $loggedInUser["username"]);
// 	die();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expresso | Exit Your Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <link href="css/blog-post.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-color:#6F4436!important">
    <div class="container">
      <a class="navbar-brand" href="/"><i class="fa fa-coffee"></i> <span style="font-family: 'Do Hyeon', sans-serif;">Expresso</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item nav-divider">|</li>
          <?php
            if ($loggedInUser !== null) {
              echo '<li class="nav-item"><a class="nav-link active" href="editprofile.php?user=' . $loggedInUser["username"] . '">Welcome ' . $loggedInUser["username"] . '</a></li>';
              echo '<li class="nav-item nav-divider">|</li>';
              echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
            } else {
              echo '<li class="nav-item"><a class="nav-link" href="/">Login</a></li>';
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-12">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $user['name'] ?></h1>

        <!-- Author -->
        <p class="lead">
          User profile of <span style="color:#a0a0a0">@<?php echo $user['username'] ?>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Last updated in August 2020</p>

        <hr>

        <!-- Preview Image -->
        <center>
          <img class="rounded-circle" style="width:256px;height:256px;" src="<?php echo $user['profile_pic'] ?>" alt="">
        </center>

        <hr>

        <!-- Post Content -->
        <form>
          <div class="form-group">
            <label for="username">Username:</label>
            <input class="form-control" type="text" value="<?php echo $user['username']; ?>" id="username" disabled>
          </div>
          <!-- TODO: Remove the below to prevent writing password/password hash to response. -->
          <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" value="<?php echo $user['password']; ?>" id="password" disabled>
          </div>
          <div class="form-group">
            <label for="username">Bio:</label>
            <textarea class="form-control"><?php echo $user['bio'] ?></textarea>
          </div>
          <div class="form-group">
            <label for="new_password">New password:</label>
            <input class="form-control" type="password" id="current_password">
          </div>
          <div class="form-group">
            <label for="rep_new_password">Repeat new password:</label>
            <input class="form-control" type="password" id="current_password">
          </div>
          <p class="text-right">
            <input type="submit" class="btn btn-success" value="Save changes">
          </p>
        </form>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" style="width:50px;height:50px;" src="img/admin.jpeg" alt="">
          <div class="media-body">
            <h5 class="mt-0">Welcome to Expresso! | <a href="profile.php?user=admin" style="color:#a0a0a0">Site Administrator Cody</a></h5>
            Welcomo to Expresso! If you need any help getting started, feel free to reach out!
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Expresso Blogs 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
