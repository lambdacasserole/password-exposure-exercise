<?php

require_once "accounts.php";

// Get logged in user if there is one.
session_start();
if (isset($_SESSION['loggedinuser'])) {
  $loggedInUser = getUserByUsername($_SESSION['loggedinuser']);
} else {
  $loggedInUser = null;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expresso | Home</title>

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
            <a class="nav-link active" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item nav-divider">|</li>
          <?php
            if ($loggedInUser !== null) {
              echo '<li class="nav-item"><a class="nav-link" href="editprofile.php?user=' . $loggedInUser["username"] . '">Welcome ' . $loggedInUser["username"] . '</a></li>';
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
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">Growing Coffee at Home: A <i>Robust</i> Approach</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="/profile.php?user=astoddart">Anne Stoddart</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on August 24<sup>th</sup> 2023 at 12:14pm</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="img/blogimage.jpg" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">
          If you're a plant to cup sort of coffee drinker, you'll be familiar with the challenges involved in growing your own <i>arabica</i> beans at home. Fiddly climate control setups and expensive tropical potting soil come to mind,
          which often means failure after costly failure for new coffee growers until they stumble upon the magic formula.
        </p>

        <p>
          What if I told you that nature provides a solution here, and a <i>robust</i> one at that?
        </p>

        <p>
          Some coffee snobs turn their noses up (quite literally!) at <i>robusta</i> beans, due to their reputation as cheap, bitter and a key component of instant coffees the world over. The irony is, however, that the humble <i>robusta</i>
          bean is often discussed unfavourably over a coffee by drinkers who are completely unaware that the expensive espresso right in front of them is as much as 15% <i>robusta</i>!
        </p>

        <blockquote class="blockquote">
          <p class="mb-0">Ew, <i>robusta</i>!? Isn't that in instant?!</p>
          <footer class="blockquote-footer">Someone who doesn't know coffee quite as well as they'd have you think!
          </footer>
        </blockquote>

        <p>Despite the poor reputation of the <i>robusta</i> flavour profile over its <i>arabica</i> counterpart, the higher caffeine content and superior mouthfeel and crema of <i>robusta</i> or blends containing it counts very much in its favour.</p>

        <p>What's more, it's super easy to grow, more resistant to disease, and <i>far</i> less choosy about soil and climate conditions. Pick up some fresh beans when you can, and try your hand at growing!</p>

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
          <img class="d-flex mr-3 rounded-circle" style="width:50px;height:50px;" src="img/everard.jpeg" alt="">
          <div class="media-body">
            <h5 class="mt-0">Love this! | <a href="profile.php?user=everarderator" style="color:#a0a0a0">Everard Teager</a></h5>
            Love this, I'd love to see how </i>liberica</i> measures up however, thinking about picking up some fresh beans myself!
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" style="width:50px;height:50px;" src="img/shannon.jpeg" alt="">
          <div class="media-body">
            <h5 class="mt-0"><i>Robusta</i> doesn't taste good! | <a href="profile.php?user=shanbeard" style="color:#a0a0a0">Shannon Beardon</a></h5>
            Seriously, don't try this and expect a decent cup. <i>Robusta</i> is bitter and nasty by itself, and the only time I tolerate it is in a blend.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" style="width:50px;height:50px;" src="img/caspar.jpeg" alt="">
              <div class="media-body">
                <h5 class="mt-0">Re: <i>Robusta</i> doesn't taste good! | <a href="profile.php?user=caspystibbs" style="color:#a0a0a0">Caspar Stibbs</a></h5>
                Shannon, people have different tastes and it's way easier for first time coffee growsers to start off with this species. I personally <i>love</i> a dark and bitter <i>robusta</i> cup!
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" style="width:50px;height:50px;" src="img/elysia.jpeg" alt="">
              <div class="media-body">
                <h5 class="mt-0">Re: <i>Robusta</i> doesn't taste good! | <a href="profile.php?user=elysiam" style="color:#a0a0a0">Elysia Mowat</a></h5>
                <i>Robusta</i> is not my cup of tea (or coffee!) either Shannon, but I still agree with Caspar here. Anne even mentioned the bitter flavour profile in the article!
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

<?php if ($loggedInUser === null) { ?>
        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Log in</h5>
          <div class="card-body">
            <p>
              Members log in below to post and comment!
            </p>
            <?php if (isset($_GET['action']) && $_GET['action'] === 'loggedout') { ?>
            <p class="alert alert-warning">
              You have logged out.
            </p>
            <?php } else if (isset($_GET['action']) && $_GET['action'] === 'elogin') { ?>
            <p class="alert alert-danger">
              Incorrect username or password.
            </p>
            <?php } ?>
            <form action="login.php" method="post">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" placeholder="" name="username" id="username">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" placeholder="" name="password" id="password">
              </div>
              <p class="text-right"><input type="submit" value="Log in" class="btn btn-primary"></p>
            </form>
          </div>
        </div>

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Sign up!</h5>
          <div class="card-body">
            <p>
              New members can sign up below for an account!
            </p>
            <?php if (isset($_GET['action']) && $_GET['action'] === 'thanksignup') { ?>
            <p class="alert alert-success">
              Thank you for signing up! You can now log in above.
            </p>
            <?php } else if (isset($_GET['action']) && $_GET['action'] === 'epassconf') { ?>
            <p class="alert alert-danger">
              Your password did not match the confirmation.
            </p>
            <?php } ?>
            <form action="signup.php" method="post">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" placeholder="" name="username" id="username">
              </div>
              <div class="form-group">
                <label for="password">Choose password:</label>
                <input type="password" class="form-control" placeholder="" name="password" id="password">
              </div>
              <div class="form-group">
                <label for="rep_password">Repeat password:</label>
                <input type="password" class="form-control" placeholder="" name="rep_password" id="rep_password">
              </div>
              <p class="text-right"><input type="submit" value="Sign up!" class="btn btn-success"></p>
            </form>
          </div>
        </div>
<?php } ?>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Blends</a>
                  </li>
                  <li>
                    <a href="#">Preparation</a>
                  </li>
                  <li>
                    <a href="#">Reviews</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Growing</a>
                  </li>
                  <li>
                    <a href="#">Grinding</a>
                  </li>
                  <li>
                    <a href="#">Health</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

<?php if ($loggedInUser !== null && $loggedInUser['username'] === 'admin') { ?>
        <!-- Maintenance Widget -->
        <div class="card my-4">
          <h5 class="card-header">Admin tasks</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                Remember to regularly back up the user database at: <code>/users.csv</code>
              </div>
            </div>
          </div>
        </div>
<?php } ?>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Expresso Blogs 2023</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
