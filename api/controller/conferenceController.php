<?php
/*
 * Conference controller that containts conference methods
 * Refer to Controller class for more details
 */
class ConferenceController extends BaseController
{
    private $methodClass = 'ConferenceModel';

    /* GET IMPLEMENTATION */
    public function list()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferences'
        );
    }

    public function findConferenceById()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferenceById',
            'id'
        );
    }

    public function findConferenceByTitle()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferenceByTitle',
            'title'
        );
    }

    public function findConferenceByTimeStamp()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferenceByTimeStamp',
            'timestamp'
        );
    }

    public function findConferenceByLocation()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferenceByLocation',
            'location'
        );
    }

    /* POST IMPLEMENTATION */
    public function createConference()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'postNewConference',
        );
    }

    /* PUT IMPLEMENTATION */
    public function updateConference()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'putConference',
        );
    }

    /* DELETE IMPLEMENTATION */
    public function removeConference()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'deleteConference',
            'id'
        );
    }
}
