<div class="container app">
        <h1>Cadastro de Usuário</h1>

        <form method="post" action="usuario_controller.php?acao=inserir">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name = "nome" placeholder="Insira seu nome" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name = "email" placeholder="Insira seu e-mail" required>
            </div>
  
  
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name = "senha" placeholder= "Insira uma senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
