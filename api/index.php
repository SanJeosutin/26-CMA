<?php
require __DIR__ . '/inc/bootstrap.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$validArgs = array('user', 'conference', 'submission', 'review' , 'registration', 'password');


# testing API only, will be removed later-ish
if(isset($uri[3]) && !in_array($uri[3], $validArgs) || !isset($uri[4])){
    header("HTTP/1.1 404 Not Found");
    exit;
}

require ROOT_DIR . 'controller/'.$uri[3].'Controller.php';

$reflection = new ReflectionClass($uri[3].'Controller');
$objFeedController = $reflection->newInstanceWithoutConstructor();
$methodName = $uri[4]; 
$objFeedController->{$methodName}();
