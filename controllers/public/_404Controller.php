<?php
require_once "util/ClassLoader.php";
use \util\AppConstants as AppConstants;

//Metadata used by the _404.html file
$moduleName = AppConstants::MODULE_NAME;
$homePage = AppConstants::HOME_PAGE;

require_once "views/errors/_404.html";
