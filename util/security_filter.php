<?php

/**
 * Singleton Security filter that verify the user session status.
 * Only authenticated users with a valid session can survive :)
 *
 * Author: Leonardo Otoni
 */
class security_filter
{
    private static $instance = null;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new security_filter();
        }
        return self::$instance;
    }

    /**
     * Verify the user session condition and if necessary, force it to login.
     * TODO: Implement a engine to generate internal tokens and check it against the user session.
     */
    public function validateUserSession()
    {
        session_start();
        $userSessionData = null;
        if (array_key_exists(constants::USER_SESSION_DATA, $_SESSION)) {
            $userSessionData = $_SESSION[constants::USER_SESSION_DATA];
        }

        if (!isset($userSessionData)) {
            //User not authenticated!!!
            self::forceUserLogin();
        } else {
            //User logged in, now checks if session is expired
            $userRequestTime = $_SERVER["REQUEST_TIME"];
            $userLastActivityTime = $_SESSION[constants::USER_LAST_ACTIVITY_TIME];
            $sessionDuration = constants::SESSION_DURATION_IN_SECONDS;

            $isSessionExpired = ($userRequestTime - $userLastActivityTime > $sessionDuration) ? true : false;
            if ($isSessionExpired) {
                self::invalidadeUserSession();
                self::forceUserLogin();
            } else {
                //update the user's last activity time
                $_SESSION[constants::USER_LAST_ACTIVITY_TIME] = $userRequestTime;
            }
        }
    }

    /**
     * Destroy the User's Session and build a new one.
     */
    public static function invalidadeUserSession()
    {
        session_unset();
        session_destroy();
        session_start();
    }

    /**
     * Force a new request to login page
     */
    public static function forceUserLogin()
    {
        header("Location: " . constants::LOGIN_PAGE);
    }

}
