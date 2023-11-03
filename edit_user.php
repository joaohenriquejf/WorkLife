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
      <div class="row m-5 p-3">
        <h1>Atualize suas informações</h1>
        <br>
        <br>
        <form action="config/process.php" method="POST">
          <input type="hidden" name="type" value="edit_user">
          <input type="hidden" name="email" value="<?= $_GET['email'] ?>">
          
          <h5>Atualize seu Telefone</h5>
          <input name="phone" type="text" class="form-control p-2">
          <div><br></div>

          <?php 
            if(!empty($_SESSION['profession'])){
          ?>
          
          <h5>Atualize a sua profissão</h5>
          <input name="profession" type="text" class="form-control">
          <div><br></div>

          <h5>Atualize a descrição do seu perfil</h5>
          <input name="bio" type="text" class="form-control">
          <div><br></div>
          <?php } ?>

          <button type="submit" class="btn btn-lg btn-outline-primary mt-4 mx-1 mb-3 col-2">Atualizar</button>
        </form>
      </div>
    </div>

  </main>
  <?php

  include_once("templates/footer_static.php");

?>