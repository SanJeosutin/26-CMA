<?php

class ControllerValidator extends baseController
{
    /*
     * $arg_0 = request method
     * $arg_1 = model method
     * $arg_2 = param id
     */


    static function ValidateRequestGET()
    {
        $errHeader = '';
        $errDescription = '';
        $paramVal = '';
    
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        
        if(strtoupper($arg_0) == 'GET'){
            try{
                $userModel = new UserModel();
                if (isset($arg_2)){
                    $paramVal = isset($_GET[$arg_2]) ? $_GET[$arg_2] : ''; 
                    $rawData = $userModel->$arg_1($paramVal);
                }else{
                    $rawData = $userModel->$arg_1();
                }
                $resData = json_encode($rawData);

            } catch (Exception $e) {
                $errDescription = "Something went wrong :/ " . $e->getMessage();
                $errHeader = "HTTP/1.1 500 Internal Server Error";
            }
        } else {
            $errDescription = "Cannot process request with method " . $arg_0;
            $errHeader = "HTTP/1.1 422 Unprocessable Entity";
        }

        if(!$errDescription){
            (new self)->output($resData , array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
        } else {
           (new self)->output(array('error' => $errDescription) . array('Content-Type: application/json', $errHeader));
        }
    }
}

?>