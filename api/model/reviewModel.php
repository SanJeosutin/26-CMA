<?php
require_once ROOT_DIR . '/classes/Model.class.php';

/*
 * Review model that are used to interact with the database
 * Work mainly with ReviewController
 */
class ReviewModel extends Model
{
  
    private $tableName = 'review';


    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
    // !    CURRENT IMPLEMENTATION 
    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

    /* GET IMPLEMENTATION */
    public function getReviews()
    {
        return Model::GET($this->tableName, 'ReviewId');
    }

    public function getReviewById($rId)
    {
        return Model::GET($this->tableName, 'ReviewId', $rId);
    }

    public function getReviewByTimeStamp($rTimeStamp)
    {
        return Model::GET($this->tableName, 'ReviewTimestamp', $rTimeStamp);
    }

    public function getReviewByStatus($rStatus)
    {
        return Model::GET($this->tableName, 'ReviewStatus', $rStatus);
    }

    public function getReviewBySubId($rSubId)
    {
        return Model::GET($this->tableName, 'SubmissionId', $rSubId);
    }

}
