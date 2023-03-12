<?php

class Database{
    private $connection;

    function __construct(){

        $host="127.0.0.1";
        $user="root";
        $password="";
        $db_name="clothing_website";

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
    public function update(string $table,array $field_values,string $where){
        $vlerat=null;

        foreach($field_values as $key=>$value){
            $vlerat .="$key = :$key,";
        }

        $vlerat=rtrim($vlerat,',');

        $stmt=$this->connection->prepare("Update $table SET $vlerat WHERE $where");

        foreach($vlerat as $key=>$value){
            $stmt->bindValue(":$key",$value);
        }

        $rezultati=$stmt->execute();

        if($rezultati){
            return $rezultati;
        }else{
            return $stmt->errorInfo();
        }
    }

    public function select(string $sql,array $bindArray=array(),$fetchMode=PDO::FETCH_ASSOC){
        $stmt=$this->connection->prepare($sql);

        foreach($bindArray as $key=>$value){
            $stmt->bindValue("$key",$value);
        }

        $rezultati=$stmt->execute();
        
        return $stmt->fetchAll($fetchMode);
    }
    public function delete($tablename,$id){
        $sql = "DELETE from tablename WHERE id=$id";
        $query = $this->con->query($sql);
        $data = array();
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
   /* public function delete(string $table,$id,int $limit=1){
        return $this->connection->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
   /* public function delete($table, $where){
        $condition ="";
        foreach($where as $key => $value){
            $condition .= $key. "= '" .$value."' AND ";

        }
        $condition = substr($condition,0-5);
        $sql = "DELETE FROM ". $table . " WHERE " . $condition." ";

        $result = $this->db->query($sql);

        if($result){
            return true;
        }else{
            return false;
        }
    }*/
}