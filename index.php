<?php
  session_start();
  include_once("templates/header.php");
  if((isset($_SESSION["email"]) == true) && (isset($_SESSION["password"]) == true)){
    header("Location:" . $BASE_URL . "index_logged.php");
  }

?>
  <main>
    <div class="container">
      <div class="row p-2">
        <div class="col col-6 p-5 my-5 ">
          <h1>Conectando Talentos, Criando Oportunidades.</h1>
          <div class="text-left">
            <p>Cadastre-se agora mesmo</p>
          </div>
        </div>
        <div class="col col-6 pt-3 mt-3">
          <img class="img-fluid w-75" src="img/img1.png">
        </div>
      </div>

      <!--Titulo-->
      <div class="row border mt-5">
        <div class="text-center">
          <h1 class="display-4">Anúncios</h1>
        </div>
      </div>

      <!-- Cards -->

      <?php foreach($ads as $ad): ?>
        <div class="card m-2">
        <h5 class="card-header"><?= $ad['title'] ?></h5>
        <div class="card-body">
          <p class="card-text"><?= $ad['description'] ?></p>
          <h5 class="card-title p-1"><?= $ad['budget'] ?></h5>
          <a href="login.php" class="btn btn-primary">Ver Anúncio</a>
          </div>
        </div>
      <?php endforeach?>
        
      <div class="row container mt-3">
        <div class="text-left">
          <a href="login.php" class="btn btn-outline-secondary">Ver mais</a>
        </div>
        <div class="text-center">
          <a href="login.php" class="btn btn-outline-secondary">Criar Anúncio</a>
        </div>
      </div>

      <div class="row border mt-5">
        <div class="text-center">
          <h1 class="display-4">Autônomos</h1>
        </div>
      </div>
        <br>
      <div class="row pt-2">
        <div class="col mx-2">
        <h2>Qual proficional você procura?</h2>
        <br>
          <form action="login.php">
            <input class="form-control" name="search" method="GET" placeholder="Digite os termos de pesquisa" type="text">
            </form>
        </div>
      </div>
        <br>
        <div class="row container mt-3">
        <div class="text-center">
          <a href="login.php" class="btn btn-outline-secondary">Ver todos os profissionais</a>
        </div>
      </div>
      <br>
  </main>

<?php

include_once("templates/footer.php");

?>
