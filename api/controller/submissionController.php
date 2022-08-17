<?php
/*
 * Submission controller that containts user methods
 * Refer to Controller class for more details
 */
class SubmissionController extends BaseController
{
    /* send out list of all users */
    public function list()
    {
        ControllerValidator::ValidateRequestGET(
            $_SERVER['REQUEST_METHOD'],
            'getSubmissions'
        );
    }

    /* find a specific user by Id */
    public function findSubmissionById()
    {
        ControllerValidator::ValidateRequestGET(
            $_SERVER['REQUEST_METHOD'],
            'getSubmissionById',
            'id'
        );
    }
}
