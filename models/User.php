<?php
require_once (__DIR__ .'/../libs/BaseModel.php');

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
                "password"=>$this->password,
                "roli"=>$this->roli,
                "id_dyqani"=>$this->id_dyqani
            ]);

            return $new_id;
        }else{

            $new_id=$this->db->update("perdoruesit",[

                "emri"=>$this->emri,
                "email"=>$this->email,
                "password"=>$this->password,
                "roli"=>$this->roli,
                "id_dyqani"=>$this->id_dyqani

            ], "id = {$this->id}");

            return $rezultati;
        }
    }
    
}
