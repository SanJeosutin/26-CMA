<?php
require_once ROOT_DIR . '/model/dbModel.php';

/*
 * Submission model that are used to interact with the database
 * Work mainly with SubmissionController
 */
class SubmissionModel extends Database
{
    /**
     * Submission API according to Jenna's Schema.
     * Check Semester 2 Folder.
     */

    public function getSubmission()
    {
        return $this->select("SELECT * FROM submission ORDER BY submissionId ASC");
    }



}
?>
