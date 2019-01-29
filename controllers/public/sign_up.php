<?php
/**
 * Controller to dispatch the user registration form
 * Author: Leonardo Otoni
 */

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once "views/security/sign_up.html";
} else {
    //form posted
    $email = filter_input(INPUT_POST, 'email');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $birthday = filter_input(INPUT_POST, 'birthday');
    $hash = filter_input(INPUT_POST, 'hash');

    try {
        $userModel = new user();
        $userModel->registerUser($email, $firstName, $lastName, $hash, $birthday);
        header("Location: login");
    } catch (Exception $e) {
        session_start();
        $error_message = "Invalid Registration: " . $e->getMessage();
        require_once "views/security/sign_up.html";
    }
}
