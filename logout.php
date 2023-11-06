<?php

// Destroy session.
session_start();
session_destroy();

// Redirect to homepage and show "logged out" message.
header("Location: /?action=loggedout");
