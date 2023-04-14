<?php
require_once (__DIR__ .'/../models/User.php');
require_once 'Session.php';

class AuthenticateUser{

    public static function authenticate(string $email,string $password){

        $sql="SELECT * FROM perdoruesit Where email= :email";
        $db=new Database();
        $rezultati=$db->select($sql,[
            ":email"=>$email,
        ]);
        $hashedPass = $rezultati[0]["password"];
        if(count($rezultati)>0 && password_verify($password,$hashedPass)){
            $user=new User([
                "emri"=>$rezultati[0]["emri"],
                "email"=>$rezultati[0]["email"],
                "roli"=>$rezultati[0]["roli"],
                "id_dyqani"=>$rezultati[0]["id_dyqani"],
            ]);

            $user->setId($rezultati[0]["id"]);

            return $user;
        }else{
            return false;
        }
    }
    
    public static function save(Array $user){
        Session::set("user_auth",$user);
    }
   

    public static function is_logged(){
        if(is_null(self::get())){
            return false;
        }else{
            return true;
        }
    }

    public static function logout(){
        Session::clear("user_auth");
    }
    public static function get(){
        return Session::get("user_auth");
    }
}
