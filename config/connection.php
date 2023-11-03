<?php

$host = "localhost";
$dbname = "db-worklife";
$user = "root";
$pass = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    //Ativarmodo de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
//mostra o erro
catch(PDOException $e){
    $error = $e->getMessage();
    echo "Erro: $error";
}
