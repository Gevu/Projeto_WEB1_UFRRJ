<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    if(isset($_GET['logout'])) {
        unset($_SESSION);
        session_destroy();
        header("Location: index.php");
    }

    include('../scripts/connect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include("../scripts/incluir_aluno.php"); ?>

<head>
    <meta charset="UTF-8">
    <title>CPE - Incluir participante</object></title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/resp_pag4.css">
</head>

<body>
    <div class="header">
        <h1>CORDENADORIA DE PESQUISA E EXTENSÃO</h1>
        <img src="./imagens/rural_logo_branco02.png" alt="logo rural">
    </div>
    <div class="cabecalho">
        <h2>Inclusão de Participante<a href="./resp_pag1.php"><button type="button">Página Inicial</button></a> </h2>
    </div>
    <div class="dados">
        <h3>Novo Participante</h3>
        <div class="blocos">
            <div class="bloco1">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="matriAluno">Matrícula do aluno: </label> <br><br>
                    <input name="matriAluno" class="box" type="text"> <br>
                    <spam class="error"><?php echo $matriAlunoErr; ?></spam> <br>

                    <label for="nomeAluno">Nome do aluno: </label> <br><br>
                    <input name="nomeAluno" class="box" type="text"> <br>
                    <spam class="error"><?php echo $nomeAlunoErr; ?></spam> <br>

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