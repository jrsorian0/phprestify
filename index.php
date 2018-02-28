<?php

// initialize session
// session_start();

// php error reporting
ini_set('display_errors', 'On');

define("ROOT_DIR", __DIR__);

define("APPS_DIR", dirname(__DIR__));

require_once ROOT_DIR.'/app/boot/init.php';