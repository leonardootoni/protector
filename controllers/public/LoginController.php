<?php
require_once "util/ClassLoader.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once ROOT_PATH . "views/security/login_view.html";
} else {
    //the user login form was posted
    $email = filter_input(INPUT_POST, 'email');
    $hash = filter_input(INPUT_POST, 'hash');

    try {
        $userModel = new UserModel();
        $userData = $userModel->authenticateUser($email, $hash);
        session_start();
        $_SESSION[AppConstants::USER_SESSION_DATA] = $userData;
        $_SESSION[AppConstants::USER_LAST_ACTIVITY_TIME] = $_SERVER["REQUEST_TIME"];
        header("Location: " . AppConstants::HOME_PAGE_INTRANET);
    } catch (Exception $e) {
        $userAuthenticationErrorMsg = AppConstants::USER_AUTHENTICATION_ERROR_MSG;
    }

    require_once ROOT_PATH . "views/security/login_view.html";
}
