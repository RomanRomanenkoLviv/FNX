<?php

// include core files
require_once 'core/config.php'; // config

//interfaces
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

require_once 'core/route.php';
Route::start(); // start routing
?>