<?php

require_once "shared.php";

// If this page was posted to.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Grab posted form fields.
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Grab user from database.
  $user = getUserByUsername($_POST['username']);

  // Check that user exists and password matches.
  if ($user === null || !password_verify($password, $user['password'])) {
    header("Location: /?action=elogin");
    die();
  }

  // Add user to database.
  session_start();
  $_SESSION['loggedinuser'] = $user['username'];
  header("Location: /?action=loggedin");
}
