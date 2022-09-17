<!DOCTYPE html>
<html lang="pt-br">

<?php include("../scripts/cadastro.php"); ?>

<head>
  <meta charset="UTF-8">
  <title>Cadastre-se</title>
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/cadastro.css">
</head>
<body>
  <div class="header">
    <h1>COORDENADORIA DE PESQUISA E EXTENSÃO</h1>
    <img src="./imagens/rural_logo_branco02.png" alt="logo rural">
  </div>

  <div class="posicionamento">
    <div class="cabecalho">
      <h2>Crie uma conta <a href="login.php"><button type="button">Faça Login</button></a></h2>
    </div>

    <div class="cadastro">
      <h3>Cadastro</h3>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="blocos">

          <div class="bloco1">
            <label for="name">Nome completo</label><br>
            <input type="text" name="name" class="box"><br>
            <spam class="error"><?php echo $nameErr; ?></spam>

            <label for="email">Endereço de e-mail</label><br>
            <input type="email" name="email" class="box"><br>
            <spam class="error"><?php echo $emailErr; ?></spam>

            <label for="date">Data de Nascimento</label><br>
            <input type="date" name="date" class="box"><br>
            <spam class="error"><?php echo $dateErr; ?></spam>

            <label for="senha">Senha</label><br>
            <input type="password" name="senha" class="box"><br>
            <spam class="error"><?php echo $senhaErr; ?></spam>
          </div>

          <div class="bloco2">
            <label for="matricula">Número de Matrícula</label><br>
            <input type="text" name="matricula" class="box"><br>
            <spam class="error"><?php echo $matriculaErr; ?></spam>

            <label for="campus">Selecione o Campus</label><br>
            <select name="campus" name="campus" class="box">
              <option value="opcao">Selecione uma opção--</option>
              <option value="Seropedica">Campus Seropédica - RJ</option>
              <option value="NovaIguacu">Campus Nova Iguaçu - RJ</option>
            </select><br>
            <spam class="error"><?php echo $campusErr; ?></spam>

            <label for="curso">Selecione o Curso</label><br>
            <select name="curso" name="curso" class="box">
              <option value="opcao">Selecione uma opção--</option>
              <option value="agronomia">Agronomia</option>
              <option value="geologia">Geologia</option>
              <option value="matematica">Matemática</option>
              <option value="SI">Sistemas de Informação</option>
              <option value="veterinaria">Veterinária</option>
            </select><br>
            <spam class="error"><?php echo $cursoErr; ?></spam>

            <label for="cargo">Informe o seu Cargo</label><br>
            <select name="cargo" name="cargo" class="box">
              <option value="opcao">Selecione uma opção--</option>
              <option value="Professor">Professor</option>
              <option value="Coordenador">Coordenador</option>
              <option value="Aluno">Aluno</option>
            </select>
            <spam class="error"><?php echo $cargoErr; ?></spam>
          </div>

          <br><input type="submit">
        </div>
      </form>
    </div>

    <footer>
      <div class="rodape">
        <p>Coordenadoria de Pesquisa e Extensão - Universidade Federal Rural do Rio de Janeiro</p>
        <p>UFRRJ © Todos os direiros reservados.</p>
      </div>
    </footer>
</body>
</html>