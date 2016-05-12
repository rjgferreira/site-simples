      <div class="jumbotron">
        <h1><strong>Contato</strong></h1>
        <p class="lead">Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
      </div>
      <?php if(isset($_GET['err'])) echo '<div class="alert alert-danger">'.$_GET['err'].'</div>';?>
      <?php if(isset($_GET['dds'])) echo '<div class="alert alert-info">'.$_GET['dds'].'</div>';?>
      <form class="form-signin" action="fnc/validar.php" method="post">
        <h2 class="form-signin-heading">Escreva pra gente!</h2>
        <label for="nome" class="sr-only">Nome</label>
        <input class="form-control" type="text" name="nome" placeholder="Nome" value="<?php if(isset($_SESSION['N'])) echo $_SESSION['N']; ?>"><br>
        <label for="email" class="sr-only">E-mail</label>
        <input class="form-control" type="email" name="email" placeholder="E-mail" value="<?php if(isset($_SESSION['E'])) echo $_SESSION['E']; ?>"><br>
        <label for="assunto" class="sr-only">Assunto</label>
        <input class="form-control" type="text" name="assunto" placeholder="Assunto" value="<?php if(isset($_SESSION['A'])) echo $_SESSION['A']; ?>"><br>
        <label for="mensagem" class="sr-only">Mensagem</label>
        <textarea class="form-control" name="mensagem" cols="10" rows="4" placeholder="Mensagem"><?php if(isset($_SESSION['M'])) echo $_SESSION['M']; ?></textarea><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
      </form>
