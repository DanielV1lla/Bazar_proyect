<?php

//include_once '../login2/conexionLogin.php';
include_once "db_integradore.php";
$con=mysqli_connect($host,$user,$pass,$db);

$idM= $_POST["id"];
$nombreM = $_POST["nombre"];
$precioM = $_POST["precio"];
$desM = $_POST["descripcion"];
$imagenM = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


//actualiar datos
 $actualizar = "UPDATE articulos SET nombre='$nombreM',imagen='$imagenM',precio='$precioM',descripcion='$desM' WHERE id='$idM'";

$resultado =mysqli_query($con, $actualizar);

if($resultado){
    header('Location: ../página/index.php');

} else{
    header('Location: ../login2/error-page/Error.html');
}


?>
