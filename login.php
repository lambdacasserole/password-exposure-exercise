<?php

require_once "accounts.php";

// If this page was posted to.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Grab posted form fields.
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Grab user from database.
  $user = getUserByUsername($_POST['username']);

  // Check that user exists and password matches.
  if ($user === null || $password !== $user['password']) {
    header("Location: /?action=elogin");
    die();
  }

  // TODO: Check password hash instead of password.
  // if ($user === null || !password_verify($password, $user['password'])) {
  //   header("Location: /?action=elogin");
  //   die();
  // }

  // Place user in session.
  session_start();
  $_SESSION['loggedinuser'] = $user['username'];
  header("Location: /?action=loggedin");
}
