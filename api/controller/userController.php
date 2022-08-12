<?php
/*
 * User controller that containts user methods
 * Refer to Controller class for more details
 */
class UserController extends BaseController
{
    /* send out list of all users */
    public function list()
    {
        ControllerValidator::ValidateRequestGET(
            $_SERVER['REQUEST_METHOD'],
            'getUsers'
        );
    }

    /* find a specific user by Id */
    public function findUserById()
    {
        ControllerValidator::ValidateRequestGET(
            $_SERVER['REQUEST_METHOD'],
            'getUserById',
            'id'
        );
    }
}
