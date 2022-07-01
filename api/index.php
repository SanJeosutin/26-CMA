<?php
require __DIR__ . '/inc/bootstrap.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if(isset($uri[4]) || !isset($uri[5])){
    header("HTTP/1.1 404 Not Found");
    exit;
}

require ROOT_DIR . 'controller/userController.php';
$objFeedController = new UserController();
$methodName = $uri[5]; 
$objFeedController->{$methodName}();
?>