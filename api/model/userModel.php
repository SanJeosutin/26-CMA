<?php
require_once ROOT_DIR . '/model/dbModel.php';

class UserModel extends Database
{
    public function getUsers()
    {
        return $this->select("SELECT * FROM users");
    }

    public function getUserByName($name)
    {
        return $this->select("SELECT * FROM users WHERE username = ?", array('s', $name));
    }
}
?>