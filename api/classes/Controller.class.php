<?php
/*
 * A 'generic' Controller class that can be reused by any other controller.
 * Making it easier to implement new controllers.
 */
class ControllerValidator extends baseController
{
    /*
     * $arg_0 = request method
     * $arg_1 = model method
     * $arg_2 = param id
     */

    /* static class to validate GET Request */
    static function ValidateRequestGET()
    {
        $errHeader = '';
        $errDescription = '';
        $paramVal = '';
        
        /* create a dynamic params */
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        
        /* check if 1st param is a GET Request */
        if(strtoupper($arg_0) == 'GET'){
            try{
                $userModel = new UserModel();

                /* check if 3rd param exist, when so it'll find the value that are requested */
                if (isset($arg_2)){
                    $paramVal = isset($_GET[$arg_2]) ? $_GET[$arg_2] : ''; 
                    $rawData = $userModel->$arg_1($paramVal);
                }else{
                    $rawData = $userModel->$arg_1();
                }

                /* packed it into a nice json format :) */
                $resData = json_encode($rawData);

            } catch (Exception $e) {
                $errDescription = "Something went wrong :/ " . $e->getMessage();
                $errHeader = "HTTP/1.1 500 Internal Server Error";
            }
        } else {
            $errDescription = "Cannot process request with method " . $arg_0;
            $errHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        /* if no error rise, pass the data as raw json */
        if(!$errDescription){
            (new self)->output($resData , array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
        } else {
           (new self)->output(array('error' => $errDescription) . array('Content-Type: application/json', $errHeader));
        }
    }
}

?>