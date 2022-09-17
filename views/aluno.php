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
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/aluno.css">
    <title>CPE - Aluno</title>
</head>

<body>
    <div class="header">
        <h1>COORDENADORIA DE PESQUISA E EXTENSÃO</h1>
        <img src="./imagens/rural_logo_branco02.png" alt="logo rural">
    </div>

    <div class="cabecalho">
        <h2>Olá, <?php echo $_SESSION['nome'];?>! <a href="?logout"><button type="button">Sair</button></a></h2>
    </div>

    <div class="flex_container_global">
        <div class="flex_container_esquerda">
            <div class="avisos">
                <h3>Avisos</h3>
                <ul>
                    <li>
                        <p>Você possui um relatório pendente!</p>
                        <p class="observacao"> <span>Extensão:</span> Site Educação Física </p>
                    </li>
                </ul>
            </div>

            <div class="extensoes">
                <h3>Extensões Ativas</h3>
                <ul>
                    <li>
                        <p>Site Educação Física</p>
                        <p class="observacao"> <span>Extensão:</span> Site Educação Física </p>
                        <a href="./aluno_extensao.html"><button type="button">Acessar</button></a>
                    </li>
                    <li>
                        <p>Site BSDDAY</p>
                        <p class="observacao"> <span>Extensão:</span> Site Educação Física </p>
                        <button type="button">Acessar</button>
                    </li>
                </ul>
            </div>

            <div class="extensoes">
                <h3>Extensões Concluídas</h3>
                <ul>
                    <li>
                        <p>Site Educação Física</p>
                        <p class="observacao"> <span>Extensão:</span> Site Educação Física </p>
                        <button type="button">Acessar</button>
                    </li>
                    <li>
                        <p>Site BSDDAY</p>
                        <p class="observacao"> <span>Extensão:</span> Site Educação Física </p>
                        <button type="button">Acessar</button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="dados_pessoais">
            <h3>Dados Pessoais</h3>
            <figure class="anonimo">
                <img src="./imagens/anonimo.png">
                <figcaption>
                    <p>Alterar a foto de perfil</p>
                </figcaption>
            </figure>
            <p><b>Nome:</b> <?php echo $_SESSION['nome'];?></p>
            <p><b>Email:</b> <?php echo $_SESSION['email'];?></p>
            <p><b>Matricula:</b> <?php echo $_SESSION['matricula'];?></p>
            <p><b>Data de Nasc.:</b> <?php echo $_SESSION['date'];?></p>
            <p><b>Curso:</b> <?php echo $_SESSION['curso'];?></p>
            <a href="./aluno_atualizardados.html"><button type="button">Atualizar Dados</button></a>
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