<?php
//conexão 
require_once "db_connect.php";
include_once 'include/header.php';

if(isset($_GET["codigo"])){
    $codigo = mysqli_escape_string($connect, $_GET["codigo"]);
    $sql = "SELECT * FROM infos WHERE codigo= '$codigo'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
}
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Cliente</h3>
        <form action="update.php" method="POST">
            <input type="hidden" name="codigo" value="<?php echo $dados['codigo'];?>">
            <div class="input-field col s12">
                <input type="text" name="nomecompleto" id="nomecompleto" value="<?php echo $dados['nomecompleto'];?>">
                <label for="nomecompleto">Nome Completo</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="endereço" id="endereço" value="<?php echo $dados['endereço'];?>">
                <label for="endereço">Endereço</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email'];?>">
                <label for="email">Email</label>
            </div>

            <button type="submit" name="btn-editar" class="btn">Atualizar</button>
            <a href="index.php" class="btn green">Lista de clientes</a>
        </form> 
    </div>
</div>
<?php
include_once 'include/footer.php';
?> 