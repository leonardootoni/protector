<?php
/**
 * Singleton class to store the application routes
 * Author: Leonardo Otoni
 */
class routes
{
    /**
     * All application routes must be defined here
     * "route" => "controller class"
     * controllers in the public/ folder will not require security
     */
    private static $routes = array(
        "login" => "controllers/public/login.php",
        "sign_up" => "controllers/public/sign_up.php",
        "home" => "controllers/home.php",
    );

    /**
     * Routes for static resourses that will not require security
     */
    private static $staticResourcesRoutes = array(
        "static/css/",
        "static/img/",
        "static/js/",
    );

    private static $instance = null;
    private function construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new routes();
        }
        return self::$instance;
    }

    public function getRoutes()
    {
        return self::$routes;
    }

    public function getRoutesStaticResources()
    {
        return self::$staticResourcesRoutes;
    }

}
