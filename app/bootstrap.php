<?php
    // Load Config
    require_once 'config/config.php';

    // Load Helpers
    $helperPath = APPROOT .'/../src/helpers';
    $fileList = scandir($helperPath);
    foreach ($fileList as $file) {
        // only load files that end in 'helper.php'
        if (stristr($file, 'helper.php')) {
            require_once $helperPath . '/' . $file;
        }
    }

    // Autoload Core Classes
    spl_autoload_register(function ($className) {
        if (file_exists(APPROOT .'/../src/libraries/'. $className . '.php')){
          require_once APPROOT . '/../src/libraries/'. $className . '.php';
        }
    });
