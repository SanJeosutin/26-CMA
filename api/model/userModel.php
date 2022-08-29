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

    private $tableName = 'user';

    /* GET IMPLEMENTATION */
    public function getUsers()
    {
        return Model::GET($this->tableName, 'UserId');
    }

    public function getUserById($uID)
    {
        return Model::GET($this->tableName, 'UserId', $uID);
    }

    public function getUserByFirstName($fName)
    {
        return Model::GET($this->tableName, 'UserFirstName', $fName);
    }

    public function getUserByLastName($lName)
    {
        return Model::GET($this->tableName, 'UserLastName', $lName);
    }

    public function getUserByEmail($uEmail)
    {
        return Model::GET($this->tableName, 'UserEmail', $uEmail);
    }

    public function getUserByPhoneNo($uPhoneNo)
    {
        return Model::GET($this->tableName, 'UserPhoneNo', $uPhoneNo);
    }

    public function getUserByRole($uRole)
    {
        return Model::GET($this->tableName, 'UserRole', $uRole);
    }

    /* POST IMPLEMENTATION */
    public function postNewUser()
    {
        $arrValues = file_get_contents('php://input');

        return Model::POST($this->tableName, $arrValues);
    }

    /* PUT IMPLEMENTATION */
    /*
    public function updateUserByFirstName($fName, $uId)
    {
        return Model::PUT($this->tableName, 'UserFirstName', $fName, $uId);
    }

    public function updateUserByLastName($lName, $uId)
    {
        return Model::PUT($this->tableName, 'UserLastName', $lName, $uId);
    }

    public function updateUserByEmail($uEmail, $uId)
    {
        return Model::PUT($this->tableName, 'UserEmail', $uEmail, $uId);
    }

    public function updateUserByPhoneNo($uPhoneNo, $uId)
    {
        return Model::PUT($this->tableName, 'UserPhoneNo', $uPhoneNo, $uId);
    }
    */

    /* DELETE IMPLEMENTATION */
    public function deleteUserById($uId)
    {
        return Model::DELETE($this->tableName, 'UserId', $uId);
    }
}
