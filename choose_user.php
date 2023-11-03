<?php
  session_start();
  include_once("templates/header.php");
  if((isset($_SESSION["email"]) == true) && (isset($_SESSION["password"]) == true)){
    header("Location:" . $BASE_URL . "index_logged.php");
  }
?>
  <main>
    <div class="container">
      <div class="row m-5 p-3">
    
      <div class="text-center mt-5">
        <h2>Escolha qual perfil você deseja:</h2>  
        <a href="register.php" class="btn btn-lg btn-primary mt-4 mx-1 mb-3 col-2">Anunciante</a>
        <a href="register_freelancer.php" class="btn btn-lg btn-primary mt-4 mx-1 mb-3 col-2">Autonomo</a>
      </div>
    </div>
  </main>
  <?php

include_once("templates/footer_static.php");

?>
