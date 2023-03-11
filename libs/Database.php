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
    public function insert(string $table,array $field_values){
        $fushat=implode(',',array_keys($field_values));

        $parametrat=':'.implode(', :',array_keys($field_values));
        $stmt=$this->connection->prepare("INSERT INTO $table ($fushat) VALUES ($parametrat);");

        foreach($field_values as $key => $value){
            $stmt->bindValue(":$key",$value);
        }

        $rezultati=$stmt->execute();

        if($rezultati){
            return $this->connection->lastInsertId();
        }else{
            $error=$stmt->errorInfo();
            return $error;
        }
    }
}