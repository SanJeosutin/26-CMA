<?php
/*
 * Review controller that containts conference methods
 * Refer to Controller class for more details
 */
class reviewController extends BaseController
{
    private $methodClass = 'ReviewModel';

    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
    // !    CURRENT IMPLEMENTATION 
    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

    /* GET IMPLEMENTATION */

    public function list()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviews'
        );
    }

    public function findReviewById()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviewById',
            'id'
        );
    }

    public function findReviewByTimeStamp()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviewByTimeStamp',
            'timestamp'
        );
    }

    public function findReviewByStatus()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviewByStatus',
            'status'
        );
    }

    public function findReviewBySubId()
    {
        ControllerValidator::ValidateRequestGET(
            $this->methodClass,
            $_SERVER['REQUEST_METHOD'],
            'getReviewBySubId',
            'subid'
        );
    }
    
}
