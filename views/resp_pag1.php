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

    function acessarProjeto($id) {
        $_SESSION['id_projeto'] = $id;
        header("Location: resp_pag2.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CPE - Responsável</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/resp_pag1.css">
</head>

<body>
    <div class="header">
        <h1>COORDENADORIA DE PESQUISA E EXTENSÃO</h1>
        <img src="./imagens/rural_logo_branco02.png" alt="logo rural">
    </div>
    <div class="cabecalho">
        <h2>Olá, <?php echo $_SESSION['nome'];?>! <a href="?logout"><button type="button">Sair</button></a></h2>
    </div>
    <div class="extensoes">
        <h3>Extensões ativas</h3>
        <ul>
            <?php
                $matricula_cliente = $_SESSION['matricula']; 

                $result_projeto = "SELECT id_projeto FROM participa WHERE matri_cliente = '$matricula_cliente'";
                $result_projeto = mysqli_query($conn, $result_projeto);

                while ($row = mysqli_fetch_array($result_projeto))  { 
                    $result_projeto_p = "SELECT Nome, Curso FROM projeto WHERE id = '$row[id_projeto]'";
                    $result_projeto_p = mysqli_query($conn, $result_projeto_p);
                    $row_p = mysqli_fetch_array($result_projeto_p);
                    $id = $row['id_projeto'];

                    echo "<li>
                            <p class='letrag'> 
                                $row_p[Nome] <br>
                                <span>Curso: $row_p[Curso]</span>
                            </p>
                            <form method='post'>
                                <input type='submit' name='$id' value='Acessar'>
                            </form>
                          </li><br>";

                    if (array_key_exists('id', $_POST)) {
                        acessarProjeto($id);
                    }
                }
            ?>
        </ul>
    </div>
    <div class="botoes">
        <a href="./resp_pag3.php"><button class="submit" type="button">Incluir projeto</button></a>
        <a href='./resp_pag4.php'><button class="submit" type="button">Incluir aluno</button></a>
    </div>
    <footer>
        <div class="rodape">
            <p>Coordenadoria de Pesquisa e Extensão - Universidade Federal Rural do Rio de Janeiro</p>
            <p>UFRRJ © Todos os direiros reservados.</p>
        </div>
    </footer>
</body>

</html>