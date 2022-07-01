<?php
require_once ROOT_DIR . '/model/dbModel.php';

class UserModel extends Database
{
    public function getUsers()
    {
        return $this->select("SELECT * FROM users");
    }
}
?>