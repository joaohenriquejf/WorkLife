<?php

include_once("connection.php");
include_once("url.php");

$data = $_POST;

//Modifica o banco
    $id;
    if(!empty($_GET)){
        $id = $_GET["id"];

        $query = "SELECT * FROM ads WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $ds = $stmt->fetch();
        
    }
    if(!empty($_GET)){
        $id = $_GET["id"];

        $query = "SELECT * FROM users_freelancer WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $us = $stmt->fetch();

    }
    if($data["type"] === "create_ad"){
        $title = $data["title"];
        $description = $data["description"];
        $budget = $data["budget"];
        $user_name = $data["user_name"];
        $user_city = $data["user_city"];
        $user_phone = $data["user_phone"];

        $query = "INSERT INTO ads (title, description, budget, user_name, user_city, user_phone) 
        VALUES (:title, :description, :budget, :user_name, :user_city, :user_phone)";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":budget", $budget);
        $stmt->bindParam(":user_name", $user_name);
        $stmt->bindParam(":user_city", $user_city);
        $stmt->bindParam(":user_phone", $user_phone);
        $stmt->execute();
        header("Location:" . $BASE_URL . "../success.php");

    }if($data["type"] === "edit_ad"){
        $title = $data["title"];
        $description = $data["description"];
        $budget = $data["budget"];
        $id = $data["id"];

        $query = "UPDATE ads SET title = :title, description = :description, budget = :budget WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":budget", $budget);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location:" . $BASE_URL . "../success.php");
    }

    if($data["type"] === "delete_ad"){
        
        $id = $data["id"];

        $query = "DELETE FROM ads WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location:" . $BASE_URL . "../success.php");
    }
    if($data["type"] === "edit_user"){

        $email = $data["email"];
        $phone = $data["phone"];
        $profession = $data["profession"];
        $bio = $data["bio"];

        $query = "UPDATE users_freelancer SET phone = :phone, profession = :profession, bio = :bio WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":profession", $profession);
        $stmt->bindParam(":bio", $bio);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        header("Location:../success_user.php");
    }
    if($data["type"] === "delete_user"){
        
        $id = $data["id"];

        $query = "DELETE FROM users_freelancer WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location:../success.php");
    }
else{

$ads = [];

$query = "SELECT * FROM ads";
$stmt = $conn->prepare($query);
$stmt->execute();
$ads = $stmt->fetchAll();

}

$conn = null;