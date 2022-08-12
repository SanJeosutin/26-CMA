<?php
/*
 * User controller that containts the user methods
 */
class UserController extends BaseController
{
    /* send out list of all users */
    public function list()
    {
        $this->output(
            ControllerValidator::ValidateRequestGET(
                $_SERVER['REQUEST_METHOD'], 
                'getUsers'
            )
        );
    }

    /* find a specific user by Id */
    public function findUserById()
    {
        $this->output(
            ControllerValidator::ValidateRequestGET(
                $_SERVER['REQUEST_METHOD'], 
                'getUserById', 
                'id'
            )
        );
    }

}
