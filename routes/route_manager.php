<?php
/**
 * Manages all routes registred in the routes Class and provide a controller to handle the request.
 * If a route is not found, a generic 404 controller is provided. Controllers located in the public
 * subfolder will not pass on the Security Filter.
 */
class route_manager
{
    private static $instance = null;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new route_manager();
        }
        return self::$instance;
    }

    //Get controller from the routes class.
    public function getControllerForRoute($route)
    {
        $controller = null;
        $registredRoutes = routes::getInstance()->getRoutes();
        //$staticResourseRoutes = routes::getInstance()->getRoutesStaticResources();

        /*Static resources like css and js also do requests.
         *For this cases, the controller will be the given route.*/
        //TODO: To check if this case can be avoided through Apache .htaccess
        //$isStaticResource = false;
        /**
        foreach ($staticResourseRoutes as $staticRoute) {
        $test = (\strpos($route, $staticRoute) !== false);
        if ((\strpos($route, $staticRoute) !== false)) {
        $isStaticResource = true;
        $controller = $route;
        break;
        }
        }
         */

        //if (!$isStaticResource) {
        if (array_key_exists($route, $registredRoutes)) {
            //route was found
            $controller = $registredRoutes[$route];
        } else {
            //route not registred in the controll
            $controller = constants::_404_CONTROLLER;
        }
        //}

        return $controller;
    }

}
