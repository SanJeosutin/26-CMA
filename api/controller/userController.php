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

    public function findUser()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getUser',
            'id'
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
            'updateUser',
            'id'
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
