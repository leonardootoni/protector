<?php
/**
 * Controller to dispatch the user registration form
 * Author: Leonardo Otoni
 */

use \models\UserModel as UserModel;

const SIGN_UP_VIEW = "views/security/signup.html";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once SIGN_UP_VIEW;
} else {
    //form posted
    $email = filter_input(INPUT_POST, 'email');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $birthday = filter_input(INPUT_POST, 'birthday');
    $hash = filter_input(INPUT_POST, 'hash');

    try {
        $userModel = new UserModel();
        $userModel->registerUser($email, $firstName, $lastName, $hash, $birthday);
        header("Location: login");
    } catch (Exception $e) {
        session_start();
        $error_message = "Invalid Registration: " . $e->getMessage();
        require_once SIGN_UP_VIEW;
    }
}
