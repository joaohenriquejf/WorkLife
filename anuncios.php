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
      <!--Titulo-->

      <div class="row border mt-5">
        <div class="text-center">
          <h1 class="display-4">Anúncios</h1>
        </div>
      </div>

      <!--Barra de pesquisa-->
        <div class="row pt-2">
          <div class="col mx-2">
          <form action="config/search_ad.php">
              <input class="form-control" name="search" method="GET" placeholder="Digite os termos de pesquisa" type="text">
              </form>
          </div>
        </div>

        <?php foreach($ads as $ad): ?>
          <div class="card m-2">
          <h5 class="card-header"><?= $ad['title'] ?></h5>
          <div class="card-body">
          <p class="card-text"><?= $ad['description'] ?></p>
          <h5 class="card-title p-1"><?= $ad['budget'] ?></h5>
          <a href="view_ad.php?id=<?= $ad['id'] ?>" class="btn btn-primary">Ver Anúncio</a>
            <?php
            if($_SESSION['email'] === 'admin@worklife.com.br' && $_SESSION['password'] === 'k4lc1f7rum'){ ?>
            <a href="edit_ad.php?id=<?= $ad['id'] ?>" class="btn btn-warning">Editar Anúncio</a>
  
              <form style="display: inline-block" action="config/process.php" method="POST">
                <input type="hidden" name="type" value="delete_ad">
                <input type="hidden" name="id" value="<?= $ad['id'] ?>">
                <button type="submit" class="btn btn-danger">Excluir </button>
              </form>
              
            <?php }
            elseif($ad['user_name'] === $_SESSION['name']){ ?>
            <a href="edit_ad.php?id=<?= $ad['id'] ?>" class="btn btn-warning">Editar Anúncio</a>
  
              <form style="display: inline-block" action="config/process.php" method="POST">
                <input type="hidden" name="type" value="delete_ad">
                <input type="hidden" name="id" value="<?= $ad['id'] ?>">
                <button type="submit" class="btn btn-danger">Excluir </button>
              </form>
              
            <?php } ?>
          </div>
          </div>
        <?php endforeach;?>
        
        <div class="row container mt-3">
          <div class="text-center">
            <a href="create_ad.php" class="btn btn-outline-secondary">Criar Anúncio</a>
          </div>
        </div>
    </div>
  </main>
  <?php

include_once("templates/footer.php");

?>
