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
            <form action="<?= $BASE_URL ?>config/process.php" method="POST">
                <input type="hidden" name="type" value="create_ad">
                <div>
                    <h4>Titúlo</h4>
                    <input type="text" class="form-control p-2" name="title" placeholder="Digite o que você precisa" required>
                    <div><br></div>
                </div>
                <div>
                    <h4>Descrição</h4>
                    <textarea class="form-control" name="description" rows="4" placeholder="Descreva de forma específica o que você solicita" required></textarea>
                    <div><br></div>
                </div>
                <div>
                    <h4>Orçamento</h4>
                    <input type="text" class="form-control p-2" name="budget" placeholder="Digite o orçamento que você possui" required>
                    <div><br></div>
                </div>
                <input type="hidden" name="user_name" value="<?=$_SESSION['name']?>">
                <input type="hidden" name="user_city" value="<?=$_SESSION['city']?>">
                <input type="hidden" name="user_phone" value="<?=$_SESSION['phone']?>">
                <div class="text-center container m-3">
                <button type="submit" class="btn btn-outline-primary">Criar anuncio</button>
                </div>
               
            </form>
        </div>
    </div>
</main>
<?php

include_once("templates/footer_static.php");

?>