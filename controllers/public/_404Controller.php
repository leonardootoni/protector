<?php

namespace controllers\publicControllers {

    use \util\AppConstants as AppConstants;

    //Metadata used by the _404.html file
    $urlHomePage = AppConstants::MODULE_NAME . AppConstants::HOME_PAGE;
    $backgroundImage = AppConstants::MODULE_NAME . "static/img/404_background.jpg";
    require_once "views/errors/_404.html";

}
