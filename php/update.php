<?php
//sessão// 
session_start();
// conexão // 
require_once "db_connect.php";

if(isset($_POST["codigo"])){
    $nomecompleto = mysqli_escape_string($connect, $_POST["nomecompleto"]);
    $endereço = mysqli_escape_string($connect, $_POST["endereço"]);
    $email = mysqli_escape_string($connect, $_POST["email"]);
    $codigo = mysqli_escape_string($connect, $_POST["codigo"]);
    $sql = "UPDATE infos SET nomecompleto= '$nomecompleto', endereço= '$endereço', email ='$email' WHERE codigo ='$codigo'";
    echo "$sql";
    if(mysqli_query($connect, $sql)){
        $_SESSION["mensagem"]= "Atualizado com sucesso!";
        header('location:index.php');
    }
    else{
        $_SESSION["mensagem"]= "Erro no atualizar!";
        header('location:index.php');
    }
}
?>
 