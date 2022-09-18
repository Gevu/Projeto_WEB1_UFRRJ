<?php 

include('../scripts/connect.php');

// VALIDAÇÃO DO PROJETO.

$matriAluno = $nomeAluno = $curso = "";
$matriAlunoErr = $nomeAlunoErr = $cursoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["nomeAluno"])) {
        $nomeAlunoErr = "* Nome obrigatório <br>";
    } else {
        $nomeAluno = input_data($_POST["nomeAluno"]);
        if (!preg_match("/^[\w]*$/", $nomeAluno)) {
            $nomeAlunoErr = "* Apenas letras e espaços em branco são permitidos <br>";
        }
    }

    if (empty($_POST["matriALuno"])) {
        $matriAlunoErr = "* Matricula obrigatória <br>";
    } else {
        $matriAluno = input_data($_POST["matriAluno"]);
        if ($matriAluno > 99999999999 || $matriAluno < 10000000000) {
            $matriAlunoErr = "* Matricula inválida <br>";
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

if ($matriAlunoErr == "" && 
    $nomeAlunoErr == "" &&
    $cursoErr == "" &&
    $matriAluno != "") {

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