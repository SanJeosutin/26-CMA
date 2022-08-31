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
    public function getUser($uID)
    {
        return Model::GET($this->tableName, 'UserId', $uID);
    }


    /* POST IMPLEMENTATION */
    public function postNewUser()
    {
        $arrValues = file_get_contents('php://input');

        return Model::POST($this->tableName, $arrValues);
    }

    /* PUT IMPLEMENTATION */
    public function updateUser($uId, $params = array())
    {
        //! WORK IN PROGRESS
        #return Model::POST($this->tableName, );
    }

    /* DELETE IMPLEMENTATION */
    public function deleteUser($uId)
    {
        return Model::POST($this->tableName, 'UserId', $uId);
    }
}
