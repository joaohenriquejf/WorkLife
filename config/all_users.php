<?php
session_start();
include_once("connection.php");
include_once("url.php");
include_once("../templates/header_logged_search.php");

if(!empty($_SESSION)){

$query = "SELECT * FROM users_freelancer";
$stmt = $conn->prepare($query);
$stmt->execute();
$all_users = $stmt->fetchAll();
?>
<div class="container">
  <br>
  <div class="row pt-2">
    <div class="col mx-2">
        <h3>Pesquisar autônomo</h3>
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
      foreach($all_users as $all_user): ?>
      <tr>
        <td><?= $all_user['name'] ?></td>
        <td><?= $all_user['city'] ?></td>
        <td><?= $all_user['profession'] ?></td>
        <td><a class="btn btn-sm btn-primary" href="../view_user.php?id=<?= $all_user['id'] ?>">Visualizar perfil</a></td>
        <?php if($_SESSION['email'] === 'admin@worklife.com.br' && $_SESSION['password'] === 'k4lc1f7rum'){ ?>
              <form style="display: inline-block" action="process.php" method="POST">
                <input type="hidden" name="type" value="delete_user">
                <input type="hidden" name="id" value="<?= $all_user['id'] ?>">
                <td><button type="submit" class="btn btn-danger">Excluir </button></td>
              </form>
              
            <?php }endforeach; ?>
      </tr>
    </tbody>
  </table>
</div>
<?php
include_once("../templates/footer_static.php");
}else{ header("Location:../login.php" );}
?>