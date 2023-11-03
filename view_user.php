<?php
  session_start();
  include_once("templates/header_logged.php");
  include_once("auth_process.php");
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
                        <td><?=$us['name']?></td>
                    </tr>
                    
                    <tr>
                        <th>E-mail</th>
                        <td><?=$us['email']?></td>
                    </tr>
                    
                    <tr>
                        <th>Cidade</th>
                        <td><?=$us['city']?></td>
                    </tr>

                    <tr>
                        <th>Profissão</th>
                        <td><?=$us['profession']?></td>
                    </tr>
                    
                    <tr>
                        <th>Telefone para contato:</th>
                        <td><?=$us['phone']?></td>
                    </tr>
                    
                    <tr>
                        <th>Descrição</th>
                        <td><?=$us['bio']?></td>
                    </tr>
                </table>
                
                
            </div>
            
        </div>
        
    </div>
<?php

include_once("templates/footer_static.php");
//<a class="btn btn-sm btn-outline-warning" href="change_info.php">Alterar informações</a>
?>