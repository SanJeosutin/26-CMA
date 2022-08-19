<?php
/*
 * User controller that containts user methods
 * Refer to Controller class for more details
 */
class UserController extends BaseController
{
    private $methodClass = 'UserModel';

    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
    // !    CURRENT IMPLEMENTATION 
    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

    /* GET IMPLEMENTATION */
    public function list()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUsers'
        );
    }

    public function findUserById()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserById',
            'id'
        );
    }

    public function findUserByFirstName()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByFirstName',
            'firstName'
        );
    }

    public function findUserByByLastName()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByLastName',
            'lastName'
        );
    }

    public function findUserByEmail()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByEmail',
            'email'
        );
    }

    public function findUserByPhoneNo()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByPhoneNo',
            'phoneNo'
        );
    }

    public function findUserByRole()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByRole',
            'role'
        );
    }

    /* POST IMPLEMENTATION */

    /* PUT IMPLEMENTATION */
    /*
    public function updateUserByFirstName()
    {
        ControllerValidator::ValidateRequestPUT(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'updateUserByFirstName',
            'firstName',
            'id'
        );
    }

    public function updateUserByLastName()
    {
        ControllerValidator::ValidateRequestPUT(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'updateUserByLastName',
            'lastName',
            'id'
        );
    }

    public function updateUserByEmail()
    {
        ControllerValidator::ValidateRequestPUT(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'updateUserByEmail',
            'email',
            'id'
        );
    }

    public function updateUserByPhoneNo()
    {
        ControllerValidator::ValidateRequestPUT(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'updateUserByPhoneNo',
            'phoneNo',
            'id'
        );
    }
    */

    /* DELETE IMPLEMENTATION */

    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
    // !        NEW IMPLEMENTATION
    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
    /*
    public function find()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        switch ($arg_0) {
            case 'users':
                ControllerValidator::ValidateRequestGET(
                    $this->methodClass,
                    $_SERVER['REQUEST_METHOD'],
                    'GET'
                );
                break;

            case 'id':
                ControllerValidator::ValidateRequestGET(
                    $this->methodClass,
                    $_SERVER['REQUEST_METHOD'],
                    'GET',
                    'id'
                );
                break;
        }
    }
    */
}
