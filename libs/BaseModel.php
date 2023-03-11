<?php

include_once "Database.php";

class BaseModel{
    protected $db;

    function __construct(){
        $this->db=new Database();
    }
}
?>