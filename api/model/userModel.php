<?php
require_once ROOT_DIR . '/model/dbModel.php';

class UserModel extends Database
{
    /**
     * User API according to Jenna's Schema.
     * Check Semester 2 Folder.
     */

    public function getUsers()
    {
        return $this->select("SELECT * FROM user ORDER BY user_id ASC");
    }

    public function getUserById($uID)
    {
        return $this->select('SELECT * FROM user WHERE UserId LIKE ?', array('s', $uID));
    }

    public function getUserByFirstName($fName)
    {
        return $this->select('SELECT * FROM user WHERE UserFirstName LIKE ?', array('s', $fName));
    }

    public function getUserByLastName($lName)
    {
        return $this->select('SELECT * FROM user WHERE UserLastName LIKE ?', array('s', $lName));
    }

    public function getUserByEmail($uEmail)
    {
        return $this->select('SELECT * FROM user WHERE UserEmail LIKE ?', array('s', $uEmail));
    }


}
?>
