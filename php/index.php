<?php
// conexão //
include_once "db_connect.php";
include_once "include/header.php";
include_once "include/message.php";
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Clientes</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome Completo:</th>
                    <th>Endereço:</th>
                    <th>Email:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM infos";
                $resultado = mysqli_query($connect, $sql);
                if (mysqli_num_rows($resultado) >0){
                while($dados = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?php echo $dados["nomecompleto"]?></td>
                    <td><?php echo $dados["endereço"]?></td>
                    <td><?php echo $dados["email"]?></td> 
                    <td><a href="editar.php?codigo=<?php echo $dados["codigo"]?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                    <td><a href="#modal<?php echo $dados["codigo"]?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                
                    <!-- Modal Structure -->
                    <div id="modal<?php echo $dados["codigo"]?>" class="modal">
                    <div class="modal-content">
                        <h4>Opa!</h4>
                        <p>Tem certeza que deseja excluir este registro?</p>
                    </div>
                    <div class="modal-footer">
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="codigo" value="<?php echo $dados["codigo"]?>">
                        <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar!</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                    </form>
                </div>
                </div>
                </tr>
                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">Adicionar Cliente</a>  
    </div>
</div>
<?php
include_once "include/footer.php";
?> 