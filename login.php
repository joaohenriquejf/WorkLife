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
        <form action="<?= $BASE_URL ?>config/authenticate.php" method="POST">
          <input type="hidden" name="type" value="login">
          <h4>Email</h4>
          <input name="email" type="text" class="form-control p-2" required>
          <div><br></div>

          <h4>Senha:</h4>
          <input name="password" type="password" class="form-control p-2" >
          <div><br></div>

          <button type="submit" class="btn btn-lg btn-outline-primary mt-4 mx-1 mb-3 col-2">Logar</button>
        </form>
    
      <div class="text-center mt-5">
        <h5>Caso ainda não esteja cadastrado clique no botão abaixo</h5>  
        <a href="choose_user.php" class="btn btn-primary mt-4 mx-1 mb-3 col-2">Cadastrar</a>
      </div>
    </div>
  </main>
  <?php

include_once("templates/footer_static.php");

?>
