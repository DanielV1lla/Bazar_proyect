<?php


include_once 'conexionLogin.php';


//echo password_hash("bluuweb",PASSWORD_DEFAULT)."\n";
// capturar datos por post 
 $usuario_nuevo = $_POST['nombre_usuario'];
 $contrasena = $_POST['contrasena'];
 $contrasena2 = $_POST['contrasena2'];

//verificar usuario 
$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_nuevo));
$resultado = $sentencia->fetch();

//var_dump($resultado);

if($resultado){
    header('Location: ../login2/error-page/Error.html');
    die();
}


 //hash de contraseña
 $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
/*
 echo '<pre>';
 var_dump($usuario_nuevo);
 var_dump($contrasena);
 var_dump($contrasena2);
 echo '</pre>';
*/

if(password_verify($contrasena2,$contrasena)){
   // echo "funciono";

   

    $sql_agregar = 'INSERT INTO usuarios(nombre,contrasena) VALUES (?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);

    if( $sentencia_agregar->execute(array($usuario_nuevo,$contrasena)) ){
     ?>   <div id="app">
        <div class="txt">Usuario agregado<span class="blink">_</span></div>
        <br>
        <button type="button" onclick="location.href='login.html'" class="btn btn-warning">Iniciar sesión</button>
         <!--   <a  class="btn btn-warning btn-lg"href ="../login.html" role="button">Regresar</a> --> 
         <!--  <button type="button" onclick="location.href='../login.html'" class="btn btn-warning">Regresar</button> -->
         
        </div>
        <br>
        
       
       
    </div><?php
    }else{
        echo 'error<br>';
    }

    //cerramos conexion base de datos y sentencia 
    $sentencia_agregar = null;
    $pdo = null;

} else{
    header('Location: ../login2/error-page/Errorcontraseñas.html');
    die();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error!</title>
    <link rel="shortcut icon" href="../MisatoGoth.png"/>
    <link rel="stylesheet" type="text/css" href="../login2/error-page/Error.css">
</head>
<body>
    <div id="app">
       
        <button type="button" onclick="location.href='login.html'" class="btn btn-warning">Iniciar sesión</button>
       
       
    </div>
    
</body>
</html>