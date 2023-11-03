<?php
  session_start();
  include_once("templates/header_logged.php");

?>
  <main>
    <div class="container">
      <div class="col m-5 p-3">
    
      <div class="text-center mt-5">
        <h2>O que você deseja ver?</h2>  
        <a href="config/all_users.php" class="btn btn-lg btn-primary mt-4 mx-1 mb-3 col-2">Usuários</a>
        <a href="anuncios.php" class="btn btn-lg btn-primary mt-4 mx-1 mb-3 col-2">Anúncios</a>
      </div>
    </div>
  </main>
  <?php

include_once("templates/footer_static.php");

?>
