<?php
define("ROOT_PATH", dirname(__FILE__, 2) . "/");

spl_autoload_register(function ($className) {
    $directories = array("routes/", "controllers/", "database/", "models/", "util/");
    foreach ($directories as $directory) {
        //see if the file exsists
        if (file_exists(ROOT_PATH . $directory . $className . '.php')) {
            require_once (ROOT_PATH . $directory . $className . '.php');
            //only require the class once, so quit after to save effort (if you got more, then name them something else
            return;
        }
    }
});
