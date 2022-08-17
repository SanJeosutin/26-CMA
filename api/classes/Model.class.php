<?php 
require_once ROOT_DIR . '/model/dbModel.php';

class Model extends Database
{
    
    /*
     * $arg_0 = table name
     * $arg_1 = column name
     * $arg_2 = column value
     */

    static protected function GET()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        if (!isset($arg_2)) {
            return (new self)->select("SELECT * FROM $arg_0 ORDER BY $arg_1 ASC");
        }

        return (new self)->select("SELECT * FROM $arg_0 WHERE $arg_1 LIKE ?", array('s', $arg_2));
    }
    /*
     ! -*-*-*-*-*-*NOTICE-*-*-*-*-*-*
     -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     ! The following methods are not yet tested.
     ! You have been warn. 
     -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     */

    //! have not been tested yet.
    static protected function POST()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        return (new self)->select("INSERT INTO $arg_0 ($arg_1) VALUES ($arg_2)");
    }

    static protected function PUT()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        return (new self)->select("UPDATE $arg_0 SET $arg_1 WHERE $arg_2 LIKE ?", array('s', $arg_3));
    }

    static protected function DELETE()
    {
        extract(func_get_args(), EXTR_PREFIX_ALL, "arg");

        return (new self)->select("DELETE FROM $arg_0 WHERE $arg_1 LIKE ?", array('s', $arg_2));
    }
}
?>