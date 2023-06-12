<?php
require_once("RegistroUser.php");
$registrar = new RegistroUser();

$registrar->EmpleadoId = 5 /* $_POST["EmpleadoId"] */;
$registrar->email = $_POST["email"];
$registrar->username = $_POST["username"];
$registrar->password = $_POST["password"];
/* echo "<br>EmpleadoId = ".$registrar->EmpleadoId;

echo "<br>email = ".$registrar->email;
echo "<br>username = ".$registrar->username;

echo "<br>password = ".$registrar->password; */

if($registrar->CheckUser($_POST["email"])){

echo "<script>
alert('Usuario  YA existente, por favor logueate' );
document.location='loginRegister.php';
</script>
";
}else{
    $registrar->insertData();
    echo "<script>
alert('Usuario registrado exitosamente');
document.location='../Home/home.php';
</script>";
}
?>