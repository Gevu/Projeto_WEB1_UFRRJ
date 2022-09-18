<?php 

include('../scripts/connect.php');

// VALIDAÇÃO DO PROJETO.

$matricula = $projeto = "";
$matriculaErr = $projetoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["matricula"])) {
        $matriculaErr = "* Matricula obrigatória <br>";
    } else {
        $matricula = input_data($_POST["matricula"]);
        if ($matricula > 99999999999 || $matricula < 10000000000) {
            $matriculaErr = "* Matricula inválida <br>";
        }
    }

    if ($_POST["projeto"] == "opcao") {
        $projetoErr = "* Projeto obrigatório <br>";
    } else {
        $projeto = input_data($_POST["projeto"]);
    }
}

function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
}

// ESCREVE NO BANCO

if ($matriculaErr == "" &&
    $projetoErr == "" &&
    $matricula != "") {

    $result_projeto = "SELECT id FROM projeto WHERE Nome = '$projeto'";
    $result_projeto = mysqli_query($conn, $result_projeto);
    $row = mysqli_fetch_array($result_projeto);

    // Cadastra na tabela do relacionamento.
    $result_participa = "INSERT INTO participa (matri_cliente, id_projeto)
                        VALUES ('$matricula','$row[id]')";
    $result_participa = mysqli_query($conn, $result_participa);

    mysqli_close($conn);
}

?>