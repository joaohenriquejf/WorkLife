<?php
include_once("connection.php");
include_once("url.php");
include_once("../templates/header_logged_search.php");

if(!empty($_GET['search'])){

$search = $_GET['search'];
$query = "SELECT * FROM ads WHERE title LIKE '%$search%'";
$stmt = $conn->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll();
}
?>
<main>
    <div class="container">
      <!--Titulo-->

      <div class="row border mt-5">
        <div class="text-center">
          <h1 class="display-4">Anuncios</h1>
        </div>
      </div>

      <!--Barra de pesquisa-->
        <div class="row pt-2">
          <div class="col mx-2">
          <form action="search_ad.php">
              <input class="form-control" name="search" method="GET" placeholder="Digite os termos de pesquisa" type="text">
              </form>
          </div>
        </div>
    <?php if(!empty($results)){

      foreach($results as $result): ?>
        <div class="card m-2">
          <h5 class="card-header"><?= $result['title'] ?></h5>
          <div class="card-body">
          <p class="card-text"><?= $result['description'] ?></p>
          <h5 class="card-title p-1"><?= $result['budget'] ?></h5>
          <a href="../view_ad.php" class="btn btn-primary">Ver Anúncio</a>
          </div>
        </div>
      <?php endforeach;
      
    }else{
    echo "nenhum resultado encontrado";
    }?>
        <div class="row container mt-3">
          <div class="text-center">
            <a href="create_ad.php" class="btn btn-outline-secondary">Criar Anuncio</a>
          </div>
        </div>
    </div>
  </main>

<?php
include_once("../templates/footer_static.php");

?>