<?php
/*
 * Submission controller that containts user methods
 * Refer to Controller class for more details
 */
class SubmissionController extends BaseController
{
    private $methodClass = 'SubmissionModel';
    
    public function list()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getSubmissions'
        );
    }

    public function findSubmissionById()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getSubmissionById',
            'id'
        );
    }

    public function findSubmissionByUserId()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getSubmissionByUserId',
            'id'
        );
    }

    public function findSubmissionByReviewerId()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getSubmissionByReviewerId',
            'id'
        );
    }

    public function findSubmissionByConferenceId()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getSubmissionByConferenceId',
            'id'
        );
    }

    public function findfindSubmissionByTimestamp()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getfindSubmissionByTimestamp',
            'timestamp'
        );
    }

    public function findSubmissionByPath()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getSubmissionByPath',
            'path'
        );
    }

    public function findSubmissionByStatus()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getSubmissionByStatus',
            'status'
        );
    }
    
    /* POST IMPLEMENTATION */
    public function createSubmission()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'postNewSubmission',
        );
    }

    /* PUT IMPLEMENTATION */
    public function updateSubmission()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'putSubmission',
        );
    }

    /* DELETE IMPLEMENTATION */
    public function removeSubmission()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'deleteSubmission',
            'id'
        );
    }
}
