<?php
/**
 * GLOBAL APP CONSTANTS
 *
 * Author: Leonardo Otoni
 */

namespace util {

    class AppConstants
    {

        //Defines the module name. It must start and end with /
        public const MODULE_NAME = "/protector/";

        //Default App Home page
        public const HOME_PAGE = "login";

        public const HOME_PAGE_INTRANET = "home";

        //Default TimeZone - It will reflect when working with date / dateTime objects
        public const DEFAULT_TIME_ZONE = "America/Toronto";

        //Max login attempts before block a user
        public const MAX_LOGIN_ATTEMPS = 3;

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

        //Default 404 Controller
        public const _404_CONTROLLER = "controllers/public/_404Controller.php";

        //Controllers that not require session validation
        public const PUBLIC_CONTROLLERS = "controllers/public/";

        //Static Content does not require security
        public const STATIC_CONTENT = "static/";

    }

}
