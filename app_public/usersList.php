<?php include ("./includes/header.php")?>
<?php
    $acao = 'recuperar';
    require './usuario_controller.php';
?>
<div class="container app">   
    <div class="col-sm-10">
		<div class="container pagina">
			<div class="row">
				<div class="col">
					<h4>Lista de usuários</h4> <hr />
					<div class="row mb-3 d-flex align-items-center tarefa">
                        <table id="lista">
							<tr> 
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Criação</th>
                            </tr>
                            <?php foreach($usuarios as $indice => $usuario): ?>
                                <tr>
                                    <td><?php echo $usuario->id ?></td>
                                    <td><?php echo $usuario->nome; ?></td>
                                    <td><?php echo $usuario->email; ?></td>
                                    <td><?php echo $usuario->data_criacao; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include ("./includes/footer.php")?>