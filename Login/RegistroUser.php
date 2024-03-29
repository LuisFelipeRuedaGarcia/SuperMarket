<?php
require_once("../Config/Conectar.php");
require_once("./LoginUser.php");
class RegistroUser extends Conectar{
    private $id;
    private $EmpleadoId;
    private $email;
    private $username;
    private $password;

    public function __construct($id=0,
    $EmpleadoId=0,
    $email="",
    $username="",
    $password="", $DbCnx="")
    {
        $this->id =$id;
        $this->EmpleadoId =$EmpleadoId;
        $this->email =$email;
        $this->username =$username;
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

    public function CheckUser($email){
        try {
            $stm=$this->DbCnx->prepare("SELECT * FROM Users WHERE email = '$email'");
            $stm->execute();
            if($stm->fetchColumn()){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function  insertData(){
        try {
            $stm=$this->DbCnx->prepare("INSERT INTO Users(EmpleadoId, email, username, password) VALUES (?,?,?,?)");
            $stm->execute([$this->EmpleadoId, $this->email,
            $this->username,
            md5($this->password)]);
            $login = new LoginUser();
            $login->email=$_POST
            ["email"];
            $login->password=$_POST["password"];
            $login->login();

        } catch (PDOException $e) {
            echo "error";
            return $e->getMessage();
        }
    }
}
?>