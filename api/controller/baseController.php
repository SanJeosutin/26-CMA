<?php

require_once ROOT_DIR . '/classes/Controller.class.php';

/*
 * Base controller that containts the base methods for all controllers
 */

class BaseController
{
    /* called when there isn't any methods or action available */
    public function __call($name, $args)
    {
        $this->output('', array('HTTP/1.1 404 Not Found'));
    }

    /* return segmented uri as array */
    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return explode('/', $uri);
    }

    /* return query vars from incoming request */
    protected function getParams()
    {
        return $_GET;
    }

    /* send API request output to client */
    protected function output($data, $headers = array())
    {
        header_remove('Set-Cookie');

        if(is_array($headers) && count($headers)){
            foreach($headers as $header){
                header($header);
            }
        }
        echo $data;
        exit;
    }
}
?>