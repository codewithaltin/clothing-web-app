<?php
   require_once "AuthenticateUser.php";
   require_once "config.php";
class Session{
    public static function start(){
        session_start();
    }

    public static function set($key,$value){
        $_SESSION[$key]=$value;
    }

    public static function get($key){
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
        else
            return null;
    }
    
    public static function clear($key){
        unset($_SESSION[$key]);
    }

    public static function destroy(){
        session_destroy();
    }
    public static function login($submit){
        if(isset($_POST['login'])){
           
            $email_err=null;
            $pass_err=null;
            $email=$_POST['email'];
            $password=$_POST['password'];
            if ($email == '' ) {
            $email_err = "Please enter your email.";
            }
            if($password ==''){
              $pass_err = "Please enter your password";
            }
            else{
                $user=AuthenticateUser::authenticate($email,$password);
                if($user !== false){
                        AuthenticateUser::save($user->toArray());
                        if($user->roli == 0){
                        header('Location: admin/dashboard.php');
                        }
                        else{
                          header('Location:index.php');
                        }
                        exit();
                }
                else{
                    $pass_err="Te dhenat e gabuara!";
                }
       }
       return array($email_err,$pass_err);
      }
    }
}