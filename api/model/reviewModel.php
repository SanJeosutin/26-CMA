<?php
require_once ROOT_DIR . '/classes/Model.class.php';

/*
 * Review model that are used to interact with the database
 * Work mainly with ReviewController
 */
class ReviewModel extends Model
{  
    private $tableName = 'review';

    /* GET IMPLEMENTATION */
    public function getReviews()
    {
        return Model::GET($this->tableName, 'ReviewId');
    }

    public function getReviewById($rID)
    {
        return Model::GET($this->tableName, 'ReviewId', $rID);
    }
    
    public function getReviewBySubmissionId($rSID)
    {
        return Model::GET($this->tableName, 'SubmissionId', $rSID);
    }

    public function getReviewByTimeStamp($rTimeStamp)
    {
        return Model::GET($this->tableName, 'ReviewTimestamp', $rTimeStamp);
    }
    
    public function getReviewByComments($comments)
    {
        return Model::GET($this->tableName, 'ReviewComments', $comments);
    }

    public function getReviewByStatus($rStatus)
    {
        return Model::GET($this->tableName, 'ReviewStatus', $rStatus);
    }

    /* POST IMPLEMENTATION */
    public function postNewReview()
    {
        $arrValues = file_get_contents('php://input');

        return Model::POST($this->tableName, $arrValues);
    }

    /* PUT IMPLEMENTATION */
    public function putReview()
    {
        $arrValues = file_get_contents('php://input');

        return Model::PUT($this->tableName, $arrValues);
    }

    /* DELETE IMPLEMENTATION */
    public function deleteReview($rID)
    {
        return Model::DELETE($this->tableName, 'ReviewId', $rID);
    }
}
