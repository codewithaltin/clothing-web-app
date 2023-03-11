<?php

class Database{
    private $connection;

    function __construct(){

        $host="127.0.0.1";
        $user="root";
        $password="";
        $db_name="sneakershop";

        try{
            $this->connection=new PDO("mysql:host=$host;dbname=$db_name",$user,$password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            echo "Lidhja me databazen deshtoi: ".$ex->getMessage();
            exit;
        }
    }
}