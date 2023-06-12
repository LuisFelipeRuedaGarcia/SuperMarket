<?php
require_once("../Config/Conectar.php");

class LoginUser extends Conectar{
    private $id;

    private $email;

    private $password;

    public function __construct($id=0,
    
    $email="",
    
    $password="", $DbCnx="")
    {
        $this->id =$id;
        $this->email =$email;
        $this->password =$password;
        parent::__construct($DbCnx);
    }

    public function __get($Property)
    {
        if(property_exists($this, $Property)){
            return $this->$Property;
        }
    }

    public function __set($Property, $value)
    {
        if(property_exists($this, $Property)){
            $this->$Property= $value;
        }
    }

    public function fetchAll(){
        try {
            $stm = $this->DbCnx->prepare("SELECT * FROM Users");
            $stm->execute(); 
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function login(){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Users WHERE email= ? AND password = ?");
            $stm->execute([$this->email, md5($this->password)]);
            $user=$stm->fetchAll();
            if(count($user)>0){
                session_start();
                $_SESSION["id"]=$user[0]["id"];
                $_SESSION["email"]=$user[0]["email"];
                $_SESSION["password"]=$user[0]["password"];
                $_SESSION["username"]=$user[0]["username"];
                return true;
            }else{
                return false;
            };
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>