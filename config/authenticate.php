<?php
session_start();
include_once("connection.php");
include_once("url.php");

$data = $_POST;

if($data["type"] === "login"){
        
        $email = $data['email'];
        $password = $data['password'];

        $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $auth = $stmt->fetch();
        if($email === 'admin@worklife.com.br' && $password === 'k4lc1f7rum'){

            header("Location:../choose_admin.php");
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

        }elseif($auth['email'] === $email && $auth['password'] === $password){
            header("Location:" . $BASE_URL . "../index_logged.php");
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['name'] = $auth['name'];
            $_SESSION['phone'] = $auth['phone'];
            $_SESSION['city'] = $auth['city'];
            $_SESSION['id'] = $auth['id'];

        }else{

            $query = "SELECT * FROM users_freelancer WHERE email='$email' and password='$password'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $auth = $stmt->fetch();

            if($auth['email'] === $email && $auth['password'] === $password){
            header("Location:" . $BASE_URL . "../index_logged.php");
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['name'] = $auth['name'];
            $_SESSION['phone'] = $auth['phone'];
            $_SESSION['city'] = $auth['city'];
            $_SESSION['profession'] = $auth['profession'];
            $_SESSION['bio'] = $auth['bio'];
            $_SESSION['id'] = $auth['id'];

            }else{
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            }
        }echo  "<script>alert('Usuário ou senha incorreto');</script>";
}else{
    $search = $_GET['search'];
    $query = "SELECT * FROM users_freelancer WHERE profession LIKE '%$search%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $f_users = $stmt->fetchAll();
}
$conn = null;

