<?php
require_once ROOT_DIR . '/model/dbModel.php';

/*
 * Submission model that are used to interact with the database
 * Work mainly with SubmissionController
 */
class SubmissionModel extends Model
{
    /**
     * Submission API according to Jenna's Schema.
     * Check Semester 2 Folder.
     */

    private $tableName = 'submission';

    public function getSubmissions()
    {
        return Model::GET($this->tableName, 'SubmissionId');
    }
    
    /* GET IMPLEMENTATION */
    public function getSubmissionById($sID)
    {
        return Model::GET($this->tableName, 'SubmissionId', $sID);
    }

    public function getSubmissionByUserId($uID)
    {
        return Model::GET($this->tableName, 'UserId', $uID);
    }

    public function getSubmissionByTimeStamp($timestamp)
    {
        return Model::GET($this->tableName, 'SubmissionTimestamp', $timestamp);
    }

    public function getSubmissionByPath($path)
    {
        return Model::GET($this->tableName, 'SubmissionPath', $path);
    }

    /* POST IMPLEMENTATION */
    public function postNewSubmission()
    {
        $arrValues = file_get_contents('php://input');

        return Model::POST($this->tableName, $arrValues);
    }

    /* PUT IMPLEMENTATION */
    public function putSubmission()
    {
        $arrValues = file_get_contents('php://input');

        return Model::PUT($this->tableName, $arrValues);
    }

    /* DELETE IMPLEMENTATION */
    public function deleteSubmission($sID)
    {
        return Model::DELETE($this->tableName, 'SubmissionId', $sID);
    }
}