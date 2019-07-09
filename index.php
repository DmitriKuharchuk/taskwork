<?php

    define('APP_PATH', __DIR__ . '/');
    define('APP_DEBUG', false);
    require(APP_PATH . 'loader/loader.php');
    $config = require(APP_PATH . 'config/config.php');
    (new loader\loader($config))->run();
