<?php
/*
 * User controller that containts user methods
 * Refer to Controller class for more details
 */
class UserController extends BaseController
{
    private $methodClass = 'UserModel';

    /* GET IMPLEMENTATION */
    public function list()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUsers'
        );
    }

    public function findUserById()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserById',
            'id'
        );
    }

    public function findUserByFirstName()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByFirstName',
            'firstName'
        );
    }

    public function findUserByLastName()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByLastName',
            'lastName'
        );
    }

    public function findUserByEmail()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByEmail',
            'email'
        );
    }

    public function findUserByPhoneNo()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByPhoneNo',
            'phoneNo'
        );
    }

    public function findUserByRole()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUserByRole',
            'role'
        );
    }
    
    /* POST IMPLEMENTATION */
    public function createUser()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'postNewUser',
        );
    }

    /* PUT IMPLEMENTATION */
    public function updateUser()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'putUser',
        );
    }

    /* DELETE IMPLEMENTATION */
    public function removeUser()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'deleteUser',
            'id'
        );
    }
}
