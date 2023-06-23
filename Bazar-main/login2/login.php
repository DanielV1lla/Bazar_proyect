<?php 

session_start();

include_once 'conexionLogin.php';


$usuario_login = $_POST['nombre_usuario'];
$contasena_login = $_POST['contrasena'];

/*
echo '<pre>';
var_dump($usuario_login);
var_dump($contasena_login);
echo '</pre>';
*/
//verificar usuario 
$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_login));
$resultado = $sentencia->fetch();
/*
echo '<pre>';
var_dump($resultado);
echo '</pre>';
*/
if(!$resultado){
    header('Location: ../login2/error-page/Errorusuario.html');
    die();
}


if(password_verify($contasena_login, $resultado['contrasena'])){
    //las contraseñas son iguales 
    $_SESSION['admin'] = $usuario_login;

    header('Location: ../página/index.php');
   

}else{
    header('Location: ../login2/error-page/Errorpassword.html');
    die();
}