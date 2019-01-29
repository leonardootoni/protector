<?php
/**
 * GLOBAL APP CONSTANTS
 */
class constants
{

    //Defines the module name. Must start and end with /
    public const MODULE_NAME = "/projects/auth/";

    //Default App Home page
    public const HOME_PAGE = "login";

    public const HOME_PAGE_INTRANET = "home";

    //Default login page address
    public const LOGIN_PAGE = self::MODULE_NAME . "login";

    //The session lifespan limit in seconds. Default 300 seconds (5 min).
    public const SESSION_DURATION_IN_SECONDS = 5;

    //User authenticated data [id, email]
    public const USER_SESSION_DATA = "USER_SESSION_DATA";

    //Used to save the time of user's last activity
    public const USER_LAST_ACTIVITY_TIME = "USER_LAST_ACTIVITY_TIME";

    public const USER_REGISTRATION_ERROR = "USER_REGISTRATION_ERROR";

    //General Error Messages
    public const USER_AUTHENTICATION_ERROR_MSG = "Invalid email or password.";

    //General Exception Messages
    public const INVALID_USER_PASSWORD_EXCEPTION = "Password not match.";
    public const USER_NOT_FOUND_EXCEPTION = "User not found into database.";
    public const USER_REGISTER_DATA_EXCEPTION = "Not all user data was provided to be inserted.";
    public const USER_AUTHENTICATION_EXCEPTION = "User data not provided.";

    //Default 404 Controller
    public const _404_CONTROLLER = "controllers/public/_404.php";

    //Controllers that not require session validation
    public const PUBLIC_CONTROLLERS = "controllers/public/";

    //Static Content does not require security
    public const STATIC_CONTENT = "static/";

}
