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
    public function update($table, $CV = array(), $condition){
        if($CV !=null)
        {
            $columns = '';
            $x = 1;
            foreach($CV as $key => $value)
            {
                $columns .= "$key='$value'";
                if($x < count($CV))
                {
                    $columns .= ",";
                }
                $x++;
            }
            $query = $this->connection->prepare("UPDATE $table SET $columns WHERE $condition");
           
            foreach($vlerat as $key=>$value){
                $stmt->bindValue(":$key",$value);
            }
            if($query->execute())
                return true;
            else
                return false;
        }
        return false;
    }

     
    public function select(string $sql,array $bindArray=array(),$fetchMode=PDO::FETCH_ASSOC){
        $stmt=$this->connection->prepare($sql);

        foreach($bindArray as $key=>$value){
            $stmt->bindValue("$key",$value);
        }

        $rezultati=$stmt->execute();
        
        return $stmt->fetchAll($fetchMode);
    }
   
    public function delete(string $table,string $where,int $limit=1){
        return $this->connection->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }

}