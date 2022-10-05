<?php
/*
 * Registration controller that containts conference methods
 * Refer to Controller class for more details
 */
class RegistrationController extends BaseController
{
    private $methodClass = 'RegistrationModel';

    /* GET IMPLEMENTATION */
    public function list()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getRegistrations'
        );
    }

    public function findRegistrationById()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getRegistrationById',
            'id'
        );
    }
    
    public function findRegistrationByUserId()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getRegistrationByUserId',
            'id'
        );
    }

    public function findRegistrationByConferenceId()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getRegistrationByConferenceId',
            'id'
        );
    }

    public function findRegistrationByTimeStamp()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getRegistrationByTimeStamp',
            'timestamp'
        );
    }

    public function findRegistrationByAttendance()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getRegistrationByAttendance',
            'attendance'
        );
    }

    /* POST IMPLEMENTATION */
    public function createRegistration()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'postNewRegistration'
        );
    }

    /* PUT IMPLEMENTATION */
    public function updateRegistration()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'putRegistration'
        );
    }

    /* DELETE IMPLEMENTATION */
    public function removeRegistration()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'deleteRegistration',
            'id'
        );
    }
}
