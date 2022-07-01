<?php
require __DIR__ . '/inc/bootstrap.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

# testing API only, will be removed later-ish
if(isset($uri[3]) && $uri[3] != 'user' || !isset($uri[4])){
    header("HTTP/1.1 404 Not Found");
    exit;
}

require ROOT_DIR . 'controller/userController.php';
$objFeedController = new UserController();
$methodName = $uri[4]; 
$objFeedController->{$methodName}();
?>