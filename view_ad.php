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
    <div class="border m-5">
      <div class="col m-5 text-left">
        <h1 class="mx-5 mt-5"><?= $ds['title'] ?></h1>
        <div class="border row"></div>
        <h5 class="m-2 ms-5"><?= $ds['user_name'] ?></h3>
        <p class="m-2 ms-5"><?= $ds['description'] ?></p>
        <br>
        <p class="m-2 ms-5">Entre em contato: <?= $ds['user_phone'] ?></p>
        <br>
        <div class="border row"></div>
        <h2 class="m-5"><?= $ds['budget'] ?></h1>
      </div> 
    </div>
  </div>
</main>

<?php

include_once("templates/footer_static.php");

?>