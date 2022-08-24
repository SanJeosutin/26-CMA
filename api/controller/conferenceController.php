<?php
/*
 * Conference controller that containts conference methods
 * Refer to Controller class for more details
 */
class conferenceController extends BaseController
{
    private $methodClass = 'ConferenceModel';

    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
    // !    CURRENT IMPLEMENTATION 
    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

    /* GET IMPLEMENTATION */

    public function list()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferences'
        );
    }

    public function findConferenceById()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferenceById',
            'id'
        );
    }

    public function findConferenceByTitle()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferenceByTitle',
            'title'
        );
    }

    public function findConferenceByTimeStamp()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferenceByTimeStamp',
            'timestamp'
        );
    }

    public function findConferenceByLocation()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferenceByLocation',
            'location'
        );
    }

    public function findConferenceByRegFee()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getConferenceByRegFee',
            'regfee'
        );
    }

    
}
