<?php

    session_start();

    // Load All configuration

    require_once 'config/config.php';
    require_once 'helpers/url_helper.php';


    // Load all of the libraries
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Database.php';

    // Load all of the libraries automatically.File name has to be the same with Classname


    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });