<?php
/*
 * A 'generic' Controller class that can be reused by any other controller.
 * Making it easier to implement new controllers.
 */
class ControllerValidator extends baseController
{
    /*
     * $arg_1 = model class
     * $arg_2 = request method
     * $arg_3 = model method
     * $arg_4 = param id
     */

     private static $errHeader = '';
     private static $errDescription = '';
     private static $paramVal = '';

    /* static class to validate GET Request */
    static function ValidateRequestGET()
    {
        /* create a dynamic params */
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        
        /* check if 2nd param is a GET Request */
        if(strtoupper($arg_1) == 'GET'){
            try{
                /* get model class from 1st args */
                $model = new $arg_0();

                /* check if 4rd param exist, when so it'll find the value that are requested */
                if (isset($arg_3)){
                    self::$paramVal = isset($_GET[$arg_3]) ? $_GET[$arg_3] : ''; 
                    $rawData = $model->$arg_2(self::$paramVal);
                }else{
                    $rawData = $model->$arg_2();
                }

                /* packed it into a nice json format :) */
                $resData = json_encode($rawData);

            } catch (Exception $e) {
                self::$errDescription = "Something went wrong :/ " . $e->getMessage();
                self::$errHeader = "HTTP/1.1 500 Internal Server Error";
            }
        } else {
            self::$errDescription = "Cannot process request with method " . $arg_1;
            self::$errHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        /* if no error rise, pass the data as raw json */
        if(!self::$errDescription){
            (new self)->output($resData , array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
        } else {
            (new self)->output(self::$errDescription, array('Content-Type: text/plain', self::$errHeader));
        }
    }
    /*
    static function ValidateRequestPUT()
    {
        return;
    }
    */
}

?>