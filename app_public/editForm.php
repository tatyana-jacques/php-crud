<?php
require_once '../app_private/class/usuario.model.php';
session_start(); // Inicia a sessão

if (isset($_SESSION['usuario'])) {// Verifica se o objeto usuário foi armazenado na sessão
    $usuario = $_SESSION['usuario'];// Recupera o objeto usuário da sessão

} else {echo "Nenhum usuário encontrado na sessão.";}?>

<?php include ("./includes/header.php")?>

<div class="container app">
        <form id = "editar-dados" method="post" action="usuario_controller.php?acao=atualizar">
            <h2>Inserir novos dados</h2>
            <!-- Campo oculto para enviar o ID do usuário -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario->getId()); ?>">
            <div class="mb-3">
                <label  for="nome" class="form-label">Editar nome</label>
                <input type="text" class="form-control" id="novo-nome" name = "nome" placeholder="Insira seu nome" value="<?php echo htmlspecialchars($usuario->getNome()); ?>"required>
            </div>
            <div class="mb-3">
                <label  for="email" class="form-label">Editar e-mail</label>
                <input type="email" class="form-control" id="novo-email" name = "email" placeholder="Insira seu e-mail" value="<?php echo htmlspecialchars($usuario->getEmail()); ?>" required>
            </div>
            <div class="mb-3">
                <label  for="password" class="form-label">Editar senha</label>
                <input type="password" class="form-control" id="nova-senha" name = "senha" placeholder= "Insira uma senha" value="<?php echo htmlspecialchars($usuario->getSenha()); ?>"required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
<?php include ("./includes/footer.php")?>