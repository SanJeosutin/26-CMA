<?php
/*
 * Submission controller that containts user methods
 * Refer to Controller class for more details
 */
class SubmissionController extends BaseController
{
    private $methodClass = 'SubmissionModel';
    
    /* send out list of all users */
    public function list()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getSubmissions'
        );
    }

    /* find a specific user by Id */
    public function findSubmissionById()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getSubmissionById',
            'id'
        );
    }
}
