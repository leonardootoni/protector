<?php
/**
 * Filter file that is used for all incoming requests.
 * This filter rely on Apache .htaccess to work.
 *
 * Author: Leonardo Otoni
 */

require_once "util/class_loader.php";
$requestURI = removeModuleNameFromRoute($_SERVER['REQUEST_URI']);
$route = removeQueryString($requestURI);
dispatchRoute($route);

/**
 * Sanitize the module name got from $_SERVER[] removing the app name.
 */
function removeModuleNameFromRoute($requestURI)
{
    $moduleName = constants::MODULE_NAME;
    $requestURI = str_replace($moduleName, "", $requestURI);
    return (!empty($requestURI) ? $requestURI : constants::HOME_PAGE);
}

/**
 * Separetes the query string to find a route.
 */
function removeQueryString($requestURI)
{
    $route = explode("?", $requestURI);
    return $route[0];
}

/**
 * For a given route, it call the route manager controller and gets a controller to handle
 * the request.
 */
function dispatchRoute($route)
{
    $controller = route_manager::getInstance()->getControllerForRoute($route);
    //$test = \strpos($controller, constants::PUBLIC_CONTROLLERS);
    if ((\strpos($controller, constants::PUBLIC_CONTROLLERS) === false)) {
        /* The controller is not public. Apply the SecurityFilter
         * A redirect to login page will be done if the user not survive in the Filter. :)
         */
        security_filter::getInstance()->validateUserSession();
    }

    require_once dirname(__FILE__) . "/" . $controller;

    /**
    if ((\strpos($controller, constants::PUBLIC_CONTROLLERS) !== false)) {
    //Not require scurity filter
    require_once dirname(__FILE__) . "/" . $controller;
    } else {
    //
    // The controller is not public. Apply the SecurityFilter
    // A redirect to the login page will be done by the filter if the user not survive. :)
    ///
    security_filter::getInstance()->validateUserSession();
    require_once dirname(__FILE__) . "/" . $controller;
    }
     */

}
