<?php

include_once("connection.php");
include_once("url.php");

$data = $_POST;

//Cria o usuário no Banco de Dados

    if($data["type"] === "create_user"){

        if($data["password"] === $data["retypepassword"]){

        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $city = $data["city"];
        $password = $data["password"];

        $query = "INSERT INTO users (name, email, phone, city, password) VALUES (:name, :email, :phone, :city, :password)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":city", $city);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        header("Location:" . $BASE_URL . "../success_user.php");


        }else{
            header("Location:" . $BASE_URL . "../aprove_password.php");
        }
    }elseif($data["type"] === "edit_user"){
        
        print_r($data);
        $name = $data["new.name"];
        $email = $data["new.email"];
        $phone = $data["new.phone"];
        $city = $data["new.city"];
        $profession = $data["new.profession"];
        $bio = $data["new.bio"];
        
    }


$conn = null;