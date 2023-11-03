<?php

include_once("connection.php");
include_once("url.php");

$data = $_POST;

//Cria o usuário no Banco de Dados
if(!empty($data)){

    if($data["type"] === "create_user_freelancer"){

        if($data["password"] === $data["retypepassword"]){

        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $city = $data["city"];
        $password = $data["password"];
        $profession = $data["profession"];
        $bio = $data["bio"];

        $query = "INSERT INTO users_freelancer (name, email, phone, city, password, profession, bio) 
        VALUES (:name, :email, :phone, :city, :password, :profession, :bio)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":city", $city);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":profession", $profession);
        $stmt->bindParam(":bio", $bio);
        $stmt->execute();

        header("Location:" . $BASE_URL . "../success_user.php");


        }else{
            header("Location:" . $BASE_URL . "../aprove_password.php");
        }
    }

}