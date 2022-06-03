<?php
//sessão// 
session_start();
// conexão // 
require_once "db_connect.php";

if(isset($_POST["btn-cadastrar"])){
    $nomecompleto = mysqli_escape_string($connect, $_POST["nomecompleto"]);
    $endereço = mysqli_escape_string($connect, $_POST["endereço"]);
    $email = mysqli_escape_string($connect, $_POST["email"]);
    $sql = "INSERT INTO infos (nomecompleto, endereço, email) VALUES ('$nomecompleto', '$endereço', '$email')";

    if(mysqli_query($connect, $sql)){
        $_SESSION["mensagem"]= "Cadastrado com sucesso!";
        header('location:index.php');
    }
    else{
        $_SESSION["mensagem"]= "Erro no cadastro!";
        header('location:index.php');
    }
}
?>
