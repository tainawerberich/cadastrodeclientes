<?php
//sessão// 
session_start();
// conexão // 
require_once "db_connect.php";

if(isset($_POST["btn-deletar"])){
    $codigo = mysqli_escape_string($connect, $_POST["codigo"]);
    $sql = "DELETE FROM infos WHERE codigo='$codigo'";

    if(mysqli_query($connect, $sql)){
        $_SESSION["mensagem"]= "Deletado com sucesso!";
        header('location:index.php');
    }
    else{
        $_SESSION["mensagem"]= "Erro ao deletar!";
        header('location:index.php');
    }
}
?>
 