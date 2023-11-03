<?php
  session_start();
  include_once("templates/header_logged.php");
  
if(!empty($_SESSION)){
  
    
?>
  <main>
    <div class="container">

    <!--Titulo-->
    <div class="row border mt-5">
        <div class="text-center">
            <h1 class="display-4">Anúncios</h1>
        </div>
    </div>

      <!-- tabela -->
    <table class="table table-hover border ">
    <br>
    <thead>
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Descrição</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach($ads as $ad): ?>
        <tr>
            <td><?= $ad['title'] ?></td>
            <td><?= $ad['description'] ?></td>
            <td><a href="view_ad.php" class="btn btn-primary btn-sm">Ver Anúncio</a></td>
            <td><a href="view_ad.php" class="btn btn-danger btn-sm">Excluir Anúncio</a></td>
        </tr>
        <?php endforeach?>
    </tbody>
    </table>

      <div class="row border mt-5">
        <div class="text-center">
          <h1 class="display-4">Usuários</h1>
        </div>
      </div>
        <br>
        <table class="table table-hover border ">
    <br>
    <thead>
        <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Descrição</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    
    <tbody>
          <?php
          
          ?>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><a href="view_ad.php" class="btn btn-primary btn-sm">Ver Anúncio</a></td>
            <td><a href="view_ad.php" class="btn btn-danger btn-sm">Excluir Anúncio</a></td>
        </tr>
        <?php endforeach?>
    </tbody>
    </table>
      <br>
    </div>
  </main>

  <!--Rodapé-->

  <?php
  }
include_once("templates/footer.php");

?>
