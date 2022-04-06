<?php
include './sql.php';
class linkDAO{
    public static function insertOrder($link_check,$link_search, $status_code)
    {
        $myDB = new MYSQLUtil();
        $query = "INSERT INTO `link`(`link_check`, `link_search`, `status_code`) VALUES (:linkCheck,:linkSearch,:statusCode)";
        $param = array(":linkCheck" => $link_check, ":linkSearch" => $link_search, ":statusCode" => $status_code);
        $myDB->insertData($query, $param);
        $myDB->disconnectDB();
    }
    
}