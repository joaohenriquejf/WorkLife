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
        <form action="config/freelancer_process.php" method="POST">
          <input type="hidden" name="type" value="create_user_freelancer">

          <h4>Nome</h4>
          <input name="name" type="text" class="form-control p-2" placeholder="Nome" required>
          <div><br></div>

          <h4>Email</h4>
          <input name="email" type="text" class="form-control p-2" placeholder="exemplo@gmail.com" required>
          <div><br></div>
          
          <h4>Telefone para contato</h4>
          <input name="phone" type="text" class="form-control p-2" placeholder="42 99999-9999" required>
          <div><br></div>

          <h4>Cidade</h4>
          <input name="city" class="form-control" placeholder="Guarapuava" required>
          <div><br></div>

          <h4>Senha:</h4>
          <input name="password" type="password" class="form-control p-2" placeholder="Senha" required>
          <div><br></div>

          <h4>Repetir senha</h4>
          <input name="retypepassword" type="password" class="form-control p-2" placeholder="Senha" required>
          <div><br></div>

          <h4>Profissão</h4>
          <input name="profession" class="form-control" placeholder="Pedreiro" required>
          <div><br></div>
          
          <h4>Seu perfil</h4>
          <input name="bio" class="form-control" placeholder="Fale um pouco sobre si mesmo" required>
          <button type="submit" class="btn btn-lg btn-outline-primary mt-4 mx-1 mb-3 col-2">Criar conta</button>
          <div><br></div>

        </form>
      </div>
    </div>

  </main>
  <?php

include_once("templates/footer.php");

?>
