<?php
/*
 * Review controller that containts conference methods
 * Refer to Controller class for more details
 */
class reviewController extends BaseController
{
    private $methodClass = 'ReviewModel';

    /* GET IMPLEMENTATION */
    public function list()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviews'
        );
    }

    public function findReviewById()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviewById',
            'id'
        );
    }
    
    public function findReviewBySubmissionId()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviewBySubmissionId',
            'id'
        );
    }

    public function findReviewByTimeStamp()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviewByTimeStamp',
            'timestamp'
        );
    }

    public function findReviewByComments()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviewByComments',
            'status'
        );
    }

    public function findReviewByStatus()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviewByStatus',
            'status'
        );
    }

    /* POST IMPLEMENTATION */
    public function createReview()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'postNewReview',
        );
    }

    /* PUT IMPLEMENTATION */
    public function updateReview()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'putReview',
        );
    }

    /* DELETE IMPLEMENTATION */
    public function removeReview()
    {
        ControllerValidator::ValidateRequest(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'deleteReview',
            'id'
        );
    }

    
}
