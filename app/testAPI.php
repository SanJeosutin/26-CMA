<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test API</title>
</head>
<body>
    <?php
    require_once "classes/dbAPI.class.php";
    $db = new Database();
    $users = $db->getAllUser();

    echo "USER: " . $users[0]['username'] . "<br>";

    foreach ($users as $user) {
        echo $user->username . "<br>";
    }

    ?>
</body>
</html>