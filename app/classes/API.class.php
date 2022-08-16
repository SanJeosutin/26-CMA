<?php
/**
 * An API class used to communicate with the API's. 
 -------------------------------------------------
 * $arg_0   : URL     [string]
 * $arg_1   : Type    [array]
 * $arg_2   : Data    [array]
 */

class API
{   
    # make request to API
    static function request()
    {
        # get arguments and split them into an array of "args"
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");
        # initialised connection to API
        $conn = curl_init();
        curl_setopt($conn, CURLOPT_URL, $arg_0);

        if(!isset($arg_1)) {
            return;
        }

        switch ($arg_1) {
            case 'HEADER':
                curl_setopt($conn, CURLOPT_HTTPHEADER, array($arg_2));
                break;
            
            default:
                return;
        }

        curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
        
        $res = curl_exec($conn);
        curl_close($conn);

        /*
            !   Something is wrong with the API implementation.
            !   Will be fixed when OAuth is implemented.
         */ 

        echo 'TEST <br><hr><pre>' .
            '   URL: ' . $arg_0 . '<br>' .
            '   TYPE: ' . $arg_1 . '<br>' .
            '   DATA: ' . $arg_2 . '<br>' .
            '   RESULT: ' . json_decode($res) . '<br></pre>';


        return json_decode($res);
    }
}

?>