<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('./src/template/header.php');


$request = $_SERVER['REQUEST_URI'];
$publicPath = __DIR__ . '/src/pages';


//! Where most of pages will be on
if (isset($_SESSION['valid']) && $_SESSION['valid']) {
    include('./src/template/navbar.php');

    switch ($request) {
        case '/':
            require $publicPath . '/dashboard.php';
            break;

        case '':
            require $publicPath . '/dashboard.php';
            break;

        case '/dashboard':
            require $publicPath . '/dashboard.php';
            break;

            //* Navbar actions
        case '/submitPaper':
            require $publicPath . '/submitPaper.php';
            break;

        case '/registerEvent':
            require $publicPath . '/registeredEvents.php';
            break;

        case '/checkSchedule':
            require $publicPath . '/userProfile.php';
            break;

            //* Dropdown actions
        case '/profile':
            require $publicPath . '/userProfile.php';
            break;

        case '/logout':
            require $publicPath . '/logout.php';
            break;

        default:
            http_response_code(404);
            require $publicPath . '/errors/404.php';
            break;
    }
} else {
    switch ($request) {
        case '/':
            require $publicPath . '/login.php';
            break;

        case '':
            require $publicPath . '/login.php';
            break;

        case '/login':
            require $publicPath . '/login.php';
            break;

        case '/register':
            require $publicPath . '/register.php';
            break;

        default:
            http_response_code(404);
            require $publicPath . '/errors/404.php';
            break;
    }
}

include('./src/template/footer.php');
