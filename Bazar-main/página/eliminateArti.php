<?php 

//Para borrar un item

include_once '../login2/conexionLogin.php';

//Obtenemos el ID del item del URL con GET
$ID = $_GET['ID'];

$sql_eliminar = 'DELETE FROM articulos WHERE id=? ';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($ID));

//Cerrar Conexion
$pdo = null;
$sentencia_eliminar = null;
header('location:index.php');