<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    if(isset($_GET['logout'])) {
        unset($_SESSION);
        session_destroy();
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html len="pt-br">

<?php include("../scripts/incluir_projeto.php"); ?>

<head>
    <meta charset="UTF-8">
    <title>CPE - Novo Projeto</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/resp_pag3.css">
</head>

<body>
    <div class="header">
        <h1>CORDENADORIA DE PESQUISA E EXTENSÃO</h1>
        <img src="./imagens/rural_logo_branco02.png" alt="logo rural">
    </div>
    <div class="cabecalho">
        <h2>Inclusão de projeto de extensão <a href="./resp_pag1.php"><button type="button">Página Inicial</button></a> </h2>
    </div>
    <div class="dados">
        <h3>Novo Projeto</h3>
        <div class="blocos">
            <div class="bloco1">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="nameProj">Nome do Projeto: </label> <br><br>
                    <input name="nameProj" class="box" type="text"> <br>
                    <spam class="error"><?php echo $nameProjErr; ?></spam> <br>

                    <label for="matriProf">Insira sua matricula: </label> <br><br>
                    <input name="matriProf" class="box" type="text"> <br>
                    <spam class="error"><?php echo $matriProfErr; ?></spam> <br>

                    <label for="curso">Selecione o curso: </label><br><br>
                    <select name="curso" class="box">
                        <option value="opcao">Selecione uma opção --</option>
                        <option value="agronomia">Agronomia</option>
                        <option value="geologia">Geologia</option>
                        <option value="matematica">Matemática</option>
                        <option value="SI">Sistemas de Informação</option>
                        <option value="veterinaria">Veterinária</option>
                    </select> <br>
                    <spam class="error"><?php echo $cursoErr; ?></spam> <br>
                    <input type="submit">
                </form>
            </div>
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