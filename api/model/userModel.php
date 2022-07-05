<?php
require_once ROOT_DIR . '/model/dbModel.php';

class UserModel extends Database
{
    /**
     * API example. Will be removed / modified in the future.   
     */
    public function getUsers()
    {
        return $this->select("SELECT * FROM users ORDER BY user_id ASC");
    }

    public function getUserByName($name)
    {
        return $this->select('SELECT * FROM users WHERE username LIKE "%?%"', array('s', $name));
    }

    /**
     * User API according to Jenna's Schema.
     * Check Semester 2 Folder.
     */
    public function getUserByFirstName($fName)
    {
        return $this->select('SELECT * FROM users WHERE FirstName LIKE "%?%"', array('s', $fName));
    }

    public function getUserByLastName($lName)
    {
        return $this->select('SELECT * FROM users WHERE LastName LIKE "%?%"', array('s', $lName));
    }

    public function getUserByEmail($uEmail)
    {
        return $this->select('SELECT * FROM users WHERE Email LIKE "%?%"', array('s', $uEmail));
    }

}
?>
