<?php
require_once ROOT_DIR . '/classes/Model.class.php';

/*
 * Password model that are used to interact with the database
 * Work mainly with PasswordController
 */
class PasswordModel extends Model
{

    private $tableName = 'password';

    /* GET IMPLEMENTATION */
    public function getPasswords()
    {
        return Model::GET($this->tableName, 'UserId');
    }

    public function getPasswordByUserId($uId)
    {
        return Model::GET($this->tableName, 'UserId', $uId);
    }

    public function getPasswordBySalt($pSalt)
    {
        return Model::GET($this->tableName, 'PassSalt', $pSalt);
    }

    public function getPasswordByHash($pHash)
    {
        return Model::GET($this->tableName, 'passHash', $pHash);
    }

    /* POST IMPLEMENTATION */
    public function postNewPassword()
    {
        $arrValues = file_get_contents('php://input');

        return Model::POST($this->tableName, $arrValues);
    }

    /* PUT IMPLEMENTATION */
    public function putPassword()
    {
        $arrValues = file_get_contents('php://input');

        return Model::PUT($this->tableName, $arrValues);
    }

    /* DELETE IMPLEMENTATION */
    public function deletePassword($pID)
    {
        return Model::DELETE($this->tableName, 'PasswordId', $pID);
    }
}
