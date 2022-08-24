<?php
require_once ROOT_DIR . '/classes/Model.class.php';

/*
 * Conference model that are used to interact with the database
 * Work mainly with ConferenceController
 */
class ConferenceModel extends Model
{
  
    private $tableName = 'conference';


    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
    // !    CURRENT IMPLEMENTATION 
    /*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

    /* GET IMPLEMENTATION */
    public function getConferences()
    {
        return Model::GET($this->tableName, 'ConferenceId');
    }

    public function getConferenceById($cId)
    {
        return Model::GET($this->tableName, 'ConferenceId', $cId);
    }

    public function getConferenceByTitle($cTitle)
    {
        return Model::GET($this->tableName, 'ConferenceTitle', $cTitle);
    }

    public function getConferenceByTimeStamp($cTimeStamp)
    {
        return Model::GET($this->tableName, 'ConferenceTimestamp', $cTimeStamp);
    }

    public function getConferenceByLocation($cLocation)
    {
        return Model::GET($this->tableName, 'ConferenceLocation', $cLocation);
    }

    public function getConferenceByRegFee($cRegFee)
    {
        return Model::GET($this->tableName, 'ConferenceRegFee', $cRegFee);
    }


}
