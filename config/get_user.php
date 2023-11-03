<?php
session_start();
include_once("connection.php");
include_once("url.php");


if(!empty($_SESSION)){

if(!empty($_GET['search'])){

$search = $_GET['search'];
$query = "SELECT * FROM users_freelancer WHERE profession LIKE '%$search%'";
$stmt = $conn->prepare($query);
$stmt->execute();
$f_users = $stmt->fetchAll();


?>
<?php
include_once("../templates/header_logged_search.php");
?>
<div class="container">
  <br>
  <div class="row pt-2">
    <div class="col mx-2">
      <form action="get_user.php">
        <input class="form-control" name="search" method="GET" placeholder="Digite os termos de pesquisa" type="text">
      </form>
    </div>
  </div>
  <br>
  <table class="table table-hover border ">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Cidade</th>
        <th scope="col">Profissão</th>
        <th scope="col"></th>
      </tr>
    </thead>
    
    <tbody>
      <?php 
      foreach($f_users as $f_user): ?>
      <tr>
        <td><?= $f_user['name'] ?></td>
        <td><?= $f_user['city'] ?></td>
        <td><?= $f_user['profession'] ?></td>
        <td><a class="btn btn-sm btn-primary" href="../view_user.php?id=<?= $f_user['id'] ?>">Visualizar perfil</a></td>
      </tr>
      <?php endforeach?>
    </tbody>
  </table>
</div>
<?php
include_once("../templates/footer_static.php");
}
}else{ 
  header("Location:../login.php" );}
?>