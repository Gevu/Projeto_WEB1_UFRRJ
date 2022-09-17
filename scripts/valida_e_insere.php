<?php 

include('../scripts/connect.php');

$name = $email = $date = $senha = $matricula = $campus = $curso = $cargo = "";
$nameErr = $emailErr = $dateErr = $senhaErr = $matriculaErr = $campusErr = $cursoErr = $cargoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])) {
        $nameErr = "* Nome obrigatório <br>";
    } else {
        $name = input_data($_POST["name"]);
        if (!preg_match("/^[a-zA-z]*$/", $name)) {
            $nameErr = "* Apenas letras e espaços em branco são permitidos <br>";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "* Email obrigatório <br>";
    } else {
        $email = input_data($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* E-mail mal formado <br>";
        }
    }

    if (empty($_POST["date"])) {
        $dateErr = "* Data obrigatória <br>";
    } else {
        $date = input_data($_POST["date"]);
    }

    if (empty($_POST["senha"])) {
        $senhaErr = "* Senha obrigatória <br>";
    } else {
        $senha = $conn->real_escape_string(trim(md5($_POST["senha"])));
    }

    if (empty($_POST["matricula"])) {
        $matriculaErr = "* Matricula obrigatória <br>";
    } else {
        $matricula = input_data($_POST["matricula"]);
        if ($matricula > 99999999999 || $matricula < 10000000000) {
            $matriculaErr = "* Matricula inválida <br>";
        }
    }

    if ($_POST["campus"] == "opcao") {
        $campusErr = "* Campus obrigatório <br>";
    } else {
        $campus = input_data($_POST["campus"]);
    }

    if ($_POST["curso"] == "opcao") {
        $cursoErr = "* Curso obrigatório <br>";
    } else {
        $curso = input_data($_POST["curso"]);
    }

    if ($_POST["cargo"] == "opcao") {
        $cargoErr = "<br>* Cargo obrigatório <br>";
    } else {
        $cargo = input_data($_POST["cargo"]);
    }
}

function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
}

if ($nameErr == "" && 
    $emailErr == "" &&
    $dateErr == "" &&
    $senhaErr == "" &&
    $matriculaErr == "" &&
    $campusErr == "" &&
    $cursoErr == "" &&
    $cargoErr == "") {
    include_once("../scripts/connect.php");

    //$secure_senha = password_hash($senha, PASSWORD_BCRYPT);

    $result_usuarios = "INSERT INTO cliente (Matricula, Nome, Email, Data_de_Nascimento, Senha, Campus, Curso, Cargo) 
                       VALUES ('$matricula', '$name', '$email', '$date', '$senha', '$campus', '$curso', '$cargo')";
    $result_usuarios = mysqli_query($conn, $result_usuarios);

    mysqli_close($conn);
    
}

?>