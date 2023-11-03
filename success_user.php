<?php
  session_start();
  include_once("templates/header_logged.php");
  if((!isset($_SESSION["email"]) == true) && (!isset($_SESSION["password"]) == true)){
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    header("Location:" . $BASE_URL . "index.php");
  }
?>
<main>
    <div class="container">
            <div class="col text-center">
                <h1 class="m-5">Usuário criado com sucesso!</h1>   
                <a class="btn btn-primary btn-lg m-5" href="index.php">Voltar</a>
            </div> 
    </div>

</main>

<?php

include_once("templates/footer_static.php");

?>