<?php
//Basic user information
$userData = $_SESSION[AppConstants::USER_SESSION_DATA];
$firstName = $userData["firstName"];

require_once "views/home.html";
