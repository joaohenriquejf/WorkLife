<?php
  session_start();
  include_once("templates/header_logged.php");
  if((!isset($_SESSION["email"]) == true) && (!isset($_SESSION["password"]) == true)){
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    header("Location:" . $BASE_URL . "index.php");
  }
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="img/profile.jpg" class="card-img-top" alt="Imagem de Perfil">
                    <div class="card-body">
                        <h5 class="card-title"><?=$_SESSION['name']?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <h2>Informações do Perfil</h2>
                <table class="table table-striped">
                    <tr>
                        <th>Nome:</th>
                        <td><?=$_SESSION['name']?></td>
                    </tr>
                    <tr>
                        <th>E-mail:</th>
                        <td><?=$_SESSION['email']?></td>
                    </tr>
                    <tr>
                        <th>Telefone:</th>
                        <td><?=$_SESSION['phone']?></td>
                    </tr>
                    <tr>
                        <th>Cidade</th>
                        <td><?=$_SESSION['city']?></td>
                    </tr>

                    <?php 
                    if(!empty($_SESSION['profession'])){
                    ?>
                    <tr>
                        <th>Profissão</th>
                        <td><?=$_SESSION['profession']?></td>
                    </tr>
                    <tr>
                        <th>Descrição</th>
                        <td><?=$_SESSION['bio']?></td>
                    </tr>
                    
                    <?php } ?>
                </table>
                
                <div class="row">
                    <div class="text-left">
                        <a class="btn btn-sm btn-outline-warning" href="edit_user.php?email=<?= $_SESSION['email'] ?>">Editar perfil</a>
                        <a class="btn btn-sm btn-outline-danger" href="config/logout.php">Desconectar</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
<?php

include_once("templates/footer_static.php");
//<a class="btn btn-sm btn-outline-warning" href="change_info.php">Alterar informações</a>
?>