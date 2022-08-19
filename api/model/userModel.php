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


    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
    // !    CURRENT IMPLEMENTATION 
    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

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
    /*
    public function createUser()
    {
        #return Model::POST($this->tableName, );
    }
    */
    
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


    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
    // !        NEW IMPLEMENTATION
    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

    // Eg: userModel->GET('ID');
    // Honestly, this implementation is not that good.
    // I need to make adjustment to the whole structure the API codebase.
    // Not worth the time to do it.
    /*
    public function GET()
    {
        $col = '';
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        switch ($arg_0) {
            case 'all':
                return Model::GET('user', 'UserId');

            case 'id':
                $col = 'UserId';
                break;

            case 'firstName':
                $col = 'UserFirstName';
                break;

            case 'lastName':
                $col = 'UserLastName';
                break;

            case 'email':
                $col = 'UserEmail';
                break;

            case 'phoneNumber':
                $col = 'UserPhoneNo';
                break;

            case 'role':
                $col = 'UserRole';
                break;

            default:
                return null;
        }

        return Model::GET('user', $col, $arg_1);
    }

    public function POST()
    {
    }

    public function PUT()
    {
    }

    public function DELETE()
    {
    }
    */
}
