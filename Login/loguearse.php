<?php
session_start();
require_once("LoginUser.php");

$credenciales = new LoginUser();
$credenciales->email=$_POST["email"];
$credenciales->password=$_POST["password"];
$login = $credenciales->login();
if($login){
    header("location:../Home/home.php");
}else{
    echo "<script>
    alert('password o email inválidos' );
    document.location='loginRegister.php';
    </script>
    ";
}
?>