<?php include ("./includes/header.php")?>
<div class="container app">
        <h1>Deletar usuário</h1>

        <form method="post" action="usuario_controller.php?acao=remover">
            <div class="mb-3">
                <label for="email" class="form-label">Insira o e-mail do usuário que deseja deletar</label>
                <input type="email" class="form-control" id="email" name = "email" placeholder="Insira e-mail" required>
            </div>
            <button type="submit" class="btn btn-primary">Deletar</button>
        </form>

    </div>

<?php include ("./includes/footer.php")?>