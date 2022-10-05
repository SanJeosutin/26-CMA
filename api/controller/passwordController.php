<?php
/*
 * Password controller that containts conference methods
 * Refer to Controller class for more details
 */
class PasswordController extends BaseController
{
    private $methodClass = 'PasswordModel';

    /* GET IMPLEMENTATION */
    public function list()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getPasswords'
        );
    }

    public function findPasswordByUserId()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getPasswordByUserId',
            'id'
        );
    }
    
    public function findPasswordBySalt()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getPasswordBySalt',
            'salt'
        );
    }

    public function findPasswordByHash()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getPasswordByHash',
            'hash'
        );
    }

    /* POST IMPLEMENTATION */
    public function createPassword()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'postNewPassword'
        );
    }

    /* PUT IMPLEMENTATION */
    public function updatePassword()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'putPassword'
        );
    }

    /* DELETE IMPLEMENTATION */
    public function removePassword()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'deletePassword',
            'id'
        );
    }
}
