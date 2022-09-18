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
                    <label for="matricula">Matrícula do aluno: </label> <br><br>
                    <input type="text" name="matricula" class="box"> <br>
                    <spam class="error"><?php echo $matriculaErr; ?></spam> <br>

                    <label for="projeto">Selecione o projeto:</label><br><br>
                    <select name="projeto" class="box">
                    <option value="opcao">Selecione uma opção--</option>
                    <?php
                        $matricula_cliente = $_SESSION['matricula']; 

                        $result_projeto = "SELECT id_projeto FROM participa WHERE matri_cliente = '$matricula_cliente'";
                        $result_projeto = mysqli_query($conn, $result_projeto);

                        while ($row = mysqli_fetch_array($result_projeto))  { 
                            $result_projeto_p = "SELECT Nome, Curso FROM projeto WHERE id = '$row[id_projeto]'";
                            $result_projeto_p = mysqli_query($conn, $result_projeto_p);
                            $row_p = mysqli_fetch_array($result_projeto_p);
                            $id = $row['id_projeto'];

                            echo "<option value='".$row_['id']."'>".$row_p['Nome']."</option>";
                        }
                    ?>
                    </select> <br>
                    <spam class="error"><?php echo $projetoErr; ?></spam> <br>
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