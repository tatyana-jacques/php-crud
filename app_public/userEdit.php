
<?php include ("./includes/header.php")?>

<div class="container app">
        <h1>Editar usuário</h1>

        <form method="post" action="usuario_controller.php?acao=recuperarPorEmail">
            
            <div class="mb-3">
                <label for="email" class="form-label">Insira o e-mail do usuário que deseja editar: </label>
                <input type="email" class="form-control" id="email" name = "email" placeholder="Insira e-mail" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

<?php include ("./includes/footer.php")?>