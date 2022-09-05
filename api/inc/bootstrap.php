<?php
/*
 * Bootstrap all the neccessary files and classes
 */

define('ROOT_DIR', __DIR__ . "/../");

require_once ROOT_DIR . '/controller/baseController.php';
require_once ROOT_DIR . 'model/userModel.php';
require_once ROOT_DIR . 'model/conferenceModel.php';
require_once ROOT_DIR . 'model/submissionModel.php';
require_once ROOT_DIR . 'model/reviewModel.php';
require_once ROOT_DIR . 'model/registrationModel.php';
require_once ROOT_DIR . 'model/passwordModel.php';
?>