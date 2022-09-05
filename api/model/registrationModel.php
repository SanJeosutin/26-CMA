<?php
require_once ROOT_DIR . '/classes/Model.class.php';

/*
 * Registration model that are used to interact with the database
 * Work mainly with RegistrationController
 */
class RegistrationModel extends Model
{

    private $tableName = 'registration';

    /* GET IMPLEMENTATION */
    public function getRegistrations()
    {
        return Model::GET($this->tableName, 'RegistrationId');
    }

    public function getRegistrationById($rId)
    {
        return Model::GET($this->tableName, 'RegistrationId', $rId);
    }

    public function getRegistrationByUserId($rUID)
    {
        return Model::GET($this->tableName, 'UserId', $rUID);
    }

    public function getRegistrationByConferenceId($rCID)
    {
        return Model::GET($this->tableName, 'ConferenceId', $rCID);
    }

    public function getRegistrationByTimeStamp($rTimeStamp)
    {
        return Model::GET($this->tableName, 'RegistrationTimeStamp', $rTimeStamp);
    }

    public function getRegistrationByFeePaid($rFeePaid)
    {
        return Model::GET($this->tableName, 'RegistrationFeePaid', $rFeePaid);
    }

    /* POST IMPLEMENTATION */
    public function postNewRegistration()
    {
        $arrValues = file_get_contents('php://input');

        return Model::POST($this->tableName, $arrValues);
    }

    /* PUT IMPLEMENTATION */
    public function putRegistration()
    {
        $arrValues = file_get_contents('php://input');

        return Model::PUT($this->tableName, $arrValues);
    }

    /* DELETE IMPLEMENTATION */
    public function deleteRegistration($rID)
    {
        return Model::DELETE($this->tableName, 'RegistrationId', $rID);
    }
}
