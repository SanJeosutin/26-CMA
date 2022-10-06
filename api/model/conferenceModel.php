<?php
require_once ROOT_DIR . '/classes/Model.class.php';

/*
 * Conference model that are used to interact with the database
 * Work mainly with ConferenceController
 */
class ConferenceModel extends Model
{

    private $tableName = 'conference';

    /* GET IMPLEMENTATION */
    public function getConferences()
    {
        return Model::GET($this->tableName, 'ConferenceId');
    }

    public function getConferenceById($cID)
    {
        return Model::GET($this->tableName, 'ConferenceId', $cID);
    }

    public function getConferenceByTitle($cTitle)
    {
        return Model::GET($this->tableName, 'ConferenceTitle', $cTitle);
    }

    public function getConferenceByStartTimestamp($cTimeStamp)
    {
        return Model::GET($this->tableName, 'ConferenceStartTimestamp', $cTimeStamp);
    }

    public function getConferenceByEndTimestamp($cTimeStamp)
    {
        return Model::GET($this->tableName, 'ConferenceEndTimestamp', $cTimeStamp);
    }

    public function getConferenceByLocation($cLocation)
    {
        return Model::GET($this->tableName, 'ConferenceLocation', $cLocation);
    }

    public function getConferenceByStatus($cStatus)
    {
        return Model::GET($this->tableName, 'ConferenceStatus', $cStatus);
    }
    
    /* POST IMPLEMENTATION */
    public function postNewConference()
    {
        $arrValues = file_get_contents('php://input');

        return Model::POST($this->tableName, $arrValues);
    }

    /* PUT IMPLEMENTATION */
    public function putConference()
    {
        $arrValues = file_get_contents('php://input');

        return Model::PUT($this->tableName, $arrValues);
    }

    /* DELETE IMPLEMENTATION */
    public function deleteConference($cID)
    {
        return Model::DELETE($this->tableName, 'ConferenceId', $cID);
    }
}
