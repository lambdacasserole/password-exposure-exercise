<?php

require_once "accounts.php";

// If this page was posted to.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Grab posted form fields.
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repPassword = $_POST['rep_password'];

  // Check that password confirmation matches.
  if ($password !== $repPassword) {
    header("Location: /?action=epassconf");
    die();
  }

  // Add user to database.
  addUser($username, $password, 'img/user.jpeg', 'Anonymous', 'No bio provided!');
  header("Location: /?action=thanksignup");
}
