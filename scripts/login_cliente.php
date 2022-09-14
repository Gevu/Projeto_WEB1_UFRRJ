<?php
include('../scripts/connect.php');


if(isset($_POST['email']) || isset($_POST['senha'])) {
  if(strlen($_POST['email']) == 0) {
    echo "Preencha seu email!";
  } else if (strlen($_POST['senha']) == 0 ) {
    echo "Preencha sua senha!";
  } else {
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM cliente WHERE email = '$email' AND senha = md5('$senha')";
    $sql_query = mysqli_query($conn, $sql_code) or die("Falha");

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1) {
      $sql_code = "SELECT * FROM cliente";
      $usuario = $sql_query->fetch_assoc();

      if(!isset($_SESSION)) {
        session_start();
      }
      $_SESSION['nome'] = $usuario['Nome'];
      $_SESSION['cargo'] = $usuario['Cargo'];
      if ($_SESSION['cargo'])
      header('Location: aluno.php');
      
    } else {
      echo "Falha ao logar";
    }
  }
}
?>