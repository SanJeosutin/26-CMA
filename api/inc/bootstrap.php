<?php
/*
 * Bootstrap all the neccessary files and classes
 */

define('ROOT_DIR', __DIR__ . "/../");

require_once ROOT_DIR . '/controller/baseController.php';
require_once ROOT_DIR . 'model/userModel.php';
require_once ROOT_DIR . 'model/submissionModel.php';
?>