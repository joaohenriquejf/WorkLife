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
        <h2>Atualize suas informações</h2>
        <br>
        <form action="config/process.php" method="POST">
          <input type="hidden" name="type" value="edit_ad">
          <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <div>
              <h4>Titúlo</h4>
              <input type="text" class="form-control p-2" name="title" placeholder="Atualize o titúlo" required>
              <div><br></div>
            </div>
            <div>
              <h4>Descrição</h4>
              <textarea class="form-control" name="description" rows="4" placeholder="Atualize a descrição" required></textarea>
              <div><br></div>
            </div>
            <div>
              <h4>Orçamento</h4>
              <input type="text" class="form-control p-2" name="budget" placeholder="Atualize o orçamento" required>
              <div><br></div> 
            </div>
          <button type="submit" class="btn btn-lg btn-outline-primary mt-4 mx-1 mb-3 col-2">Atualizar </button>
        </form>
      </div>
    </div>

  </main>
  <?php

include_once("templates/footer_static.php");

?>