<?php
require_once "API.class.php";

class Database
{
    public function __construct()
    {
        $this->baseUrl = "https://csms-api-env.herokuapp.com/api/index.php/";
        $this->baseHeader = 'Content-Type: application/json; charset=UTF-8';
    }
    
    /* START USERS API CONNECTION*/

    public function getAllUser()
    {
        return API::request(
            $this->baseUrl . 'user/list',
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findUserById($id)
    {
        return API::request(
            $this->baseUrl . 'user/findUserById?id=' . $id,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findUserByFirstName($fName)
    {
        return API::request(
            $this->baseUrl . 'user/findUserByFirstName?firstName=' . $fName,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findUserByLastName($lName)
    {
        return API::request(
            $this->baseUrl . 'user/findUserByLastName?lastName=' . $lName,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findUserByDOB($dob)
    {
        return API::request(
            $this->baseUrl . 'user/findUserByDOB?dob=' . $dob,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findUserByEmail($email)
    {
        return API::request(
            $this->baseUrl . 'user/findUserByEmail?email=' . $email,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findUserByPhoneNo($phoneno)
    {
        return API::request(
            $this->baseUrl . 'user/findUserByPhoneNo?phoneNo=' . $phoneno,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findUserByRole($role)
    {
        return API::request(
            $this->baseUrl . 'user/findUserByRole?role=' . $role,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function createNewUser()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        $fields = [
            'UserId' => $arg_0,
            'UserFirstName' => $arg_1,
            'UserLastName' => $arg_2,
            'UserDOB' => $arg_3,
            'UserEmail' => $arg_4,
            'UserPhoneNo' => $arg_5,
            'UserRole' => $arg_6
        ];

        return API::request(
            $this->baseUrl . 'user/createUser',
            "POST_REQUEST",
            $fields
        );
    }

    public function updateUser()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        $fields = [
            'UserId' => $arg_0,
            'UserFirstName' => $arg_1,
            'UserLastName' => $arg_2,
            'UserDOB' => $arg_3,
            'UserEmail' => $arg_4,
            'UserPhoneNo' => $arg_5,
            'UserRole' => $arg_6
        ];

        return API::request(
            $this->baseUrl . 'user/updateUser',
            "POST_REQUEST",
            $fields
        );
    }

    public function deleteUser($id)
    {
        return API::request(
            $this->baseUrl . 'user/removeUser?id=' . $id,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    /* END USERS API CONNECTION*/


    /* START PASSWORD API CONNECTION*/

    public function findPasswordById($id)
    {
        return API::request(
            $this->baseUrl . 'password/findPasswordByUserId?id=' . $id,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function createPassword()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        $fields = [
            'UserId' => $arg_0,
            'PassSalt' => $arg_1,
            'passHash' => $arg_2
        ];

        return API::request(
            $this->baseUrl . 'password/createPassword',
            "POST_REQUEST",
            $fields
        );
    }

    public function updatePassword()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        $fields = [
            'UserId' => $arg_0,
            'PassSalt' => $arg_1,
            'passHash' => $arg_2
        ];

        return API::request(
            $this->baseUrl . 'password/updatePassword',
            "POST_REQUEST",
            $fields
        );
    }

    public function deletePassword($id)
    {
        return API::request(
            $this->baseUrl . 'password/removePassword?id=' . $id,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    /* END PASSWORD API CONNECTION*/
    
    /* START SUBMISSION API CONNECTION*/

    public function getAllSubmission()
    {
        return API::request(
            $this->baseUrl . 'submission/list',
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findSubmissionById($id)
    {
        return API::request(
            $this->baseUrl . 'submission/findSubmissionById?id=' . $id,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findSubmissionByUserId($id)
    {
        return API::request(
            $this->baseUrl . 'submission/findSubmissionByUserId?id=' . $id,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findSubmissionByConferenceId($id)
    {
        return API::request(
            $this->baseUrl . 'submission/findSubmissionByConferenceId?id=' . $id,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findSubmissionByTimestamp($ts)
    {
        return API::request(
            $this->baseUrl . 'submission/findSubmissionByTimeStamp?timestamp=' . $ts,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findSubmissionByPath($path)
    {
        return API::request(
            $this->baseUrl . 'submission/findSubmissionByPath?path=' . $path,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function createSubmission()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        $fields = [
            'SubmissionId' => $arg_0,
            'UserId' => $arg_1,
            'ConferenceId' => $arg_2, 
            'SubmissionTimestamp' => $arg_3, 
            'SubmissionPath' => $arg_4, 
            'SubmissionStatus' => $arg_5 
        ];

        return API::request(
            $this->baseUrl . 'submission/createSubmission',
            "POST_REQUEST",
            $fields
        );
    }

    public function updateSubmission()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        $fields = [
            'SubmissionId' => $arg_0,
            'UserId' => $arg_1,
            'SubmissionTimestamp' => $arg_2,
            'SubmissionPath' => $arg_3,
        ];

        return API::request(
            $this->baseUrl . 'submission/updateSubmission',
            "POST_REQUEST",
            $fields
        );
    }

    public function deleteSubmission($id)
    {
        return API::request(
            $this->baseUrl . 'submission/removeSubmission?id=' . $id,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    /* END SUBMISSION API CONNECTION*/


    /* START CONFERENCE API CONNECTION*/

     public function getConferences()
    {
        return API::request(
            $this->baseUrl . 'conference/list',
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    public function findConferenceById($id) {
        return API::request(
            $this->baseUrl . 'conference/findConferenceById?id=' . $id,
            "GET_REQUEST",
            $this->baseHeader
        );
    }

    /* END CONFERENCE API CONNECTION*/
}