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

    public function getUsers()
    {
        return Model::GET($this->tableName, 'UserId');
    }
    
    /* GET IMPLEMENTATION */
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
    public function updateUser()
    {
        $arrValues = file_get_contents('php://input');

        return Model::PUT($this->tableName, $arrValues);
    }

    /* DELETE IMPLEMENTATION */
    public function deleteUser()
    {
        return Model::DELETE($this->tableName, 'UserId');
    }
}
