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

<!DOCTYPE HTML>
<html len="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CPE - Extensão</title>
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/resp_pag2.css">
</head>

<body>
    <div class="header">
        <h1>COORDENADORIA DE PESQUISA E EXTENSÃO</h1>
        <img src="./imagens/rural_logo_branco02.png" alt="logo rural">
    </div>
    <div class="cabecalho">
        <h2>Extensão: 
            <?php 
                $id = $_SESSION['id_projeto'];
                $result_projeto = "SELECT Nome FROM projeto WHERE id = '$id'";
                $result_projeto = mysqli_query($conn, $result_projeto);
                $row_p = mysqli_fetch_array($result_projeto);
                echo $row_p['Nome'];
            ?>
        <a href="./resp_pag1.html"><button type="button">Página Inicial</button></a> </h2>
    </div>
    <div class="caixa_maior">
        <div class="participantes">
            <h3>Participante(s)</h3>
            <ul>
                <li>
                    <p>João Vítor da Fonseca Feijó</p>
                </li>
                <li>
                    <p>Lorena Vasconcellos O. Magalhães</p>
                </li>
                <li>
                    <p>Lucas Morais Vasconcelos da Cunha</p>
                </li>
            </ul>
        </div>
        <div class="relatorios">
            <h3>Relatórios</h3>
        </div>
    </div>
    <div class="botao">
        <a href="./resp_pag4.html"><button type="submit" class="button">Incluir Participante</button></a>
        <a href="./resp_pag5.html"><button type="submit" class="button">Excluir Participante</button></a>
        <button type="submit" class="button">Validar relátorio</button>
    </div>

    <footer>
        <div class="rodape">
            <p>Coordenadoria de Pesquisa e Extensão - Universidade Federal Rural do Rio de Janeiro</p>
            <p>UFRRJ © Todos os direiros reservados.</p>
        </div>
    </footer>
</body>

</html>