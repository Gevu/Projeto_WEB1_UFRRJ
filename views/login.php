<?php include("../scripts/login_cliente.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="./css/login.css">
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
  <div class="header">
    <h1>COORDENADORIA DE PESQUISA E EXTENSÃO</h1>
    <img src="./imagens/rural_logo_branco02.png" alt="logo rural">
  </div>

  <div class="cabecalho">
    <h2>Bem vindo!</h2>
  </div>

  <div class="blocos">
      <div class="login">
        <h3>Entrar</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <input type="email" name="email" placeholder="E-mail" class="box">
          <br><br>
          <input type="password" name="senha" placeholder="Senha" class="box">
          <p>Esqueceu a senha? <a href="/">Clique aqui.</a></p>
          <input type="submit" value="Login" class="botaolog">
        </form>
      </div>

    <div class="cadastro">
      <h3>Cadastre-se</h3>
      <p>Ainda não possui um conta, registre-se para fazer parte de um projeto de extensão.</p>
      <a href="./cadastro.php"><button type="button">Crie uma conta</button></a>
    </div>
  </div>

  <footer>
    <div class="rodape">
      <p>Coordenadoria de Pesquisa e Extensão - Universidade Federal Rural do Rio de Janeiro</p>
      <p>UFRRJ © Todos os direiros reservados.</p>
    </div>
  </footer>
</body>

</html>