<?php
require_once ROOT_DIR . '/classes/Model.class.php';

/*
 * User model that are used to interact with the database
 * Work mainly with UserController
 */
class UserModel extends Model
{
    /**
     * User API according to Jenna's Schema.
     * Check Semester 2 Folder.
     */

     /*
      ! Still work in progress.
      */

    public function getUsers()
    {
        return Model::GET('user', 'UserId');
    }

    public function getUserById($uID)
    {
        return Model::GET('user', 'UserId', $uID);
    }

    public function getUserByFirstName($fName)
    {
        return Model::GET('user', 'UserId', $fName);
    }

    public function getUserByLastName($lName)
    {
        return Model::GET('user', 'UserId', $lName);
    }

    public function getUserByEmail($uEmail)
    {
        return Model::GET('user', 'UserId', $uEmail);
    }
}
?>
