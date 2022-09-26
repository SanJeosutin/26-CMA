<?php
include_once '../../classes/dbAPI.class.php';
header('Content-Type: application/json');

$db = new Database();
$input = filter_input_array(INPUT_POST);

if ($input["action"] === 'edit') {
    $db->updateUser(
        $input['UserId'],
        $input['UserFirstName'],
        $input['UserLastName'],
        $input['UserDOB'],
        $input['UserEmail'],
        $input['UserPhoneNo'],
    );
}

if ($input["action"] === 'delete') {
    $db->deletePassword($input['UserId']);
    $db->deleteUser($input['UserId']);
}
echo json_encode($input);