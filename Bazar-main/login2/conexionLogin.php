<?php 

$link = 'mysql:host=localhost;dbname=base-integradore';
$usuario = 'gato';
$pass = 'c4tserverxd';

try {

    $pdo = new PDO($link,$usuario,$pass);

    

}catch (PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>