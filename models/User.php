<?php

require_once 'C:\xampp\htdocs\clothing_website\libs\BaseModel.php';
require_once 'C:\xampp\htdocs\clothing_website\libs\AuthenticateUser.php';
require_once 'C:\xampp\htdocs\clothing_website\libs\Session.php';

class User extends BaseModel{
    
    private $id;
    public $emri;
    public $email;
    public $password;
    public $roli=1;
    public $id_dyqani=1;

    function __construct(array $user=[]){
        parent::__construct();

        $this->emri=isset($user['emri'])?$user['emri']:null;
        $this->email=isset($user['email'])?$user['email']:null;
        $this->password=isset($user['password'])?$user['password']:null;
        $this->roli=isset($user['roli'])?$user['roli']:null;
        $this->id_dyqani=isset($user['id_dyqani'])?$user['id_dyqani']:null;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }
    public function save(){

        if(is_null($this->id)){

            $new_id=$this->db->insert("perdoruesit",[
                "emri"=>$this->emri,
                "email"=>$this->email,
                "password"=>password_hash($this->password, 
                PASSWORD_DEFAULT),
                "roli"=>$this->roli,
                "id_dyqani"=>$this->id_dyqani
            ]);
            
    
            return $new_id;
        }else{

            $rezultati=$this->db->update("perdoruesit",[

                "emri"=>$this->emri,
                "email"=>$this->email,
                "password"=>password_hash($this->password, 
                PASSWORD_DEFAULT),
                "roli"=>$this->roli,
                "id_dyqani"=>$this->id_dyqani

            ], "id = {$this->id}");

            return $rezultati;
        }
    }
    public function delete(){
        $rezultati=$this->db->delete("perdoruesit","id={$this->id}");
        header("Location:../admin/user_list.php");
        return $rezultati;
    }
    public static function getById(int $id){
        $sql="SELECT * FROM perdoruesit WHERE id= :id";

        $db=new Database();

        $listt=$db->select($sql,[":id"=>$id]);

        if(count($listt)){

            $perdorues=new User();
            $perdorues->id=$listt[0]["id"];
            $perdorues->emri=$listt[0]["emri"];
            $perdorues->email=$listt[0]["email"];
            $perdorues->password=$listt[0]["password"];
            $perdorues->roli=$listt[0]["roli"];
            $perdorues->id_dyqani=$listt[0]["id_dyqani"];

            return $perdorues;
        }else{
            return null;
        }
    }
    
    public static function getList(string $condition="1"){
        $sql="SELECT * FROM perdoruesit WHERE $condition";

        $db=new Database();

        $lista=$db->select($sql);

        $users=[];

        if(count($lista)){

            foreach($lista as $listaUs){

                $user=new User();
                $user->id=$listaUs["id"];
                $user->emri=$listaUs["emri"];
                $user->email=$listaUs["email"];
                $user->password=$listaUs["password"];
                $user->roli=$listaUs["roli"];
                $user->id_dyqani=$listaUs["id_dyqani"];

                array_push($users,$user);
            }
            return $users;
        }else{
            return array();
        }
    }
    public function toArray(){
        $user=[];
        $user["id"]=$this->id;
        $user["emri"]=$this->emri;
        $user["email"]=$this->email;
        $user["password"]=$this->password;
        $user["roli"]=$this->roli;
        $user["id_dyqani"]=$this->id_dyqani;

        return $user;
    }

  public static function login($submit){
    if(isset($_POST[$submit])){
       
        $email_err=null;
        $pass_err=null;
        $email=$_POST['email'];
        $password=$_POST['password'];
        if ($email == ''  || !str_contains($email, '@') || !str_ends_with($email,".com")) {
        $email_err = "Incorrect e-mail";
        }
        if($password ==''){
          $pass_err = "Incorrect password";
        }
        if($email_err && $pass_err){ 
            return array($email_err,$pass_err);}
        else{
            $user=AuthenticateUser::authenticate($email,$password);
            if($user !== false){
                AuthenticateUser::save($user->toArray());
                header('Location:index.php');
                exit();
            }
            else
            {
                $email_err ="";
                $pass_err = "Incorrect Password." ;

            }
   }
   return array($email_err,$pass_err);
  }
}
  public static function register($submit){
    if(isset($_POST[$submit])){
        $error_msg=null;
            $email=$_POST['email'];
            $password=$_POST['password'];
            $repeatpassword=$_POST['repeatpassword'];
            $firstName=$_POST['firstname'];
            $lastName=$_POST['lastname'];
    
        if($email==""){
            $error_msg="Email eshte e detyruesheme";
        }else if ($password=="" || $repeatpassword == ""){
            $error_msg="Password must match";
        }
        else if($password != $repeatpassword){
            $error_msg ="Passwords must match.";
        }
        else if ($firstName == '' || $lastName == '' ){
          $error_msg = "Emri dhe mbiemri is required.";
          }
        if(is_null($error_msg)){
            $user=new User();
            $user->emri=$firstName;
            $user->email=$email;
            $user->password=$password;
            $user->roli=1;
            $user->id_dyqani=1;
            $user->save();
            header("Location:login.php");
            exit;
        }
      }
  }
  public function isAdmin(){
    if($this->roli==0){
        return true;
    }
    return false;
}
}