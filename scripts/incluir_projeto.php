<?php 

include('../scripts/connect.php');

// VALIDAÇÃO DO PROJETO.

$nameProj = $matriProf = $curso = "";
$nameProjErr = $matriProfErr = $cursoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["nameProj"])) {
        $nameProjErr = "* Nome obrigatório <br>";
    } else {
        $nameProj = input_data($_POST["nameProj"]);
        if (!preg_match("/^[\w]*$/", $nameProj)) {
            $nameProjErr = "* Apenas letras e espaços em branco são permitidos <br>";
        }
    }

    if (empty($_POST["matriProf"])) {
        $matriProfErr = "* Matricula obrigatória <br>";
    } else {
        $matriProf = input_data($_POST["matriProf"]);
        if ($matriProf > 99999999999 || $matriProf < 10000000000) {
            $matriProfErr = "* Matricula inválida <br>";
        }
    }

    if ($_POST["curso"] == "opcao") {
        $cursoErr = "* Curso obrigatório <br>";
    } else {
        $curso = input_data($_POST["curso"]);
    }
}

function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
}

// ESCREVE NO BANCO

// A condição "$matriProf != """ bloqueia um cadastro indesejado que acontecia sempre que abriamos
// a página "incluir_proj.php" pela primeira vez.
if ($nameProjErr == "" && 
    $matriProfErr == "" &&
    $cursoErr == "" &&
    $matriProf != "") {

    // Escreve o projeto na tabela projeto.
    $result_projetos = "INSERT INTO projeto (Nome, Curso) 
                       VALUES ('$nameProj', '$curso')";
    $result_projetos = mysqli_query($conn, $result_projetos);

    // Pega no banco o id projeto que acabou de ser escrito.
    $result_idprojeto = "SELECT id FROM projeto WHERE Nome = '$nameProj'";
    $result_idprojeto = mysqli_query($conn ,$result_idprojeto);
    $row = mysqli_fetch_array($result_idprojeto);

    // Cadastra na tabela do relacionamento.
    $result_participa = "INSERT INTO participa (matri_cliente, id_projeto)
                        VALUES ('$matriProf','$row[id]')";
    $result_participa = mysqli_query($conn, $result_participa);

    mysqli_close($conn);
}

?>