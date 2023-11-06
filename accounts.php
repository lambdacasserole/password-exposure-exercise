<?php

/**
 * The path of the user credential database on-disk.
 */
$USER_DB = "users.csv";


/**
 * Adds a user to the database.
 *
 * @param string $username  the username of the new user
 * @param string $password  the password of the new user
 * @param string $picture   the path to the new user's profile picture on disk
 * @param string $name      the real name of the new user
 * @param string $bio       the biography of the new user
 */
function addUser($username, $password, $picture, $name, $bio) {
  global $USER_DB; // Import constant.

  // Add user to database.
  file_put_contents($USER_DB, "$username, " . "$password" . ", $picture, $name, $bio\n", FILE_APPEND); 
  
  // TODO: Hash password on way into database.
  // file_put_contents($USER_DB, "$username, " . password_hash($password, PASSWORD_DEFAULT) . ", $picture, $name, $bio\n", FILE_APPEND); 
}


/**
 * Gets all users from the site user database.
 *
 * @return array[]  an array of all users registered on the site
 */
function getUsers() {
  global $USER_DB; // Import constant.

  $txt = file_get_contents($USER_DB); // Read file text.

  // Read file into list of arrays.
  $users = [];
  foreach (explode("\n", $txt) as $row) {
    $cols = explode(",", $row);
    if (sizeof($cols) !== 5) {
      continue;
    }
    $users[] = [
      "username" => trim($cols[0]),
      "password" => trim($cols[1]),
      "profile_pic" => trim($cols[2]),
      "name" => trim($cols[3]),
      "bio" => trim($cols[4]),
    ];
  }
  return $users;
}


/**
 * Gets the user with the specified username.
 *
 * @param string $username  the username to search for
 * @return array            an array representing the found user, or null if no user was found
 */
function getUserByUsername($username) {
  $users = getUsers();
  foreach ($users as $user) {
    if ($user['username'] === $username) {
      return $user;
    }
  }
  return null;
}
