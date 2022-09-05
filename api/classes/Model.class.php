<?php
require_once ROOT_DIR . '/model/dbModel.php';

class Model extends Database
{

    /*
     * $arg_0 = [string] table name
     * $arg_1 = [string] / [array] column name(s)
     * $arg_2 = [string] / [array] column value(s)
     */

    static protected function GET()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        if (!isset($arg_2)) {
            return (new self)->select("SELECT * FROM $arg_0 ORDER BY $arg_1 ASC");
        }

        return (new self)->select("SELECT * FROM $arg_0 WHERE $arg_1 LIKE ?", array('s', $arg_2));
    }


    static protected function POST()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        $key = array();
        $val = array();
        $rawData = explode('&', urldecode($arg_1));

        foreach ($rawData as $data) {
            $temp = explode('=', $data);
            array_push($key, $temp[0]);
            array_push($val, $temp[1]);
        }

        return (new self)->select("INSERT INTO $arg_0 (" . implode(', ', $key) . ") " . "VALUES ('" . implode("', '", $val) . "')");
    }


    static protected function PUT()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        $key = array();
        $val = array();

        $rawData = explode('&', urldecode($arg_1));

        foreach ($rawData as $data) {
            $temp = explode('=', $data);
            array_push($key, $temp[0]);
            array_push($val, $temp[1]);
        }

        $val = "'" . implode("' '", $val) . "'";
        $val = explode(" ", $val);

        $data = array_combine($key, $val);
        $data = urldecode(http_build_query($data));
        $data = explode("&", $data);

        $id = array_shift($data);

        return (new self)->select("UPDATE $arg_0 SET " . implode(', ', $data) . " WHERE $id");
    }

    static protected function DELETE()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        return (new self)->select("DELETE FROM $arg_0 WHERE $arg_1 LIKE ?", array('s', $arg_2));
    }
}
