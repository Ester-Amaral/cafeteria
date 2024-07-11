<?php

session_start();

$localhost = "localhost";
$user = "root";
$passw = "";
$banco = "bd_cafeteria";

global $pdo;
try{
    //testa conexão
    $pdo = new PDO("mysql:dbname=" .$banco. "; host=".$localhost, $user, $passw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOExecption $e){
    echo "ERRO: ".$e->getMessage();
    exit;
}

?>