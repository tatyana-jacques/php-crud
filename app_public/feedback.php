<?php include ("./includes/header.php")?>


<div class="container app">
<?php
if (isset($_GET['inclusao']) || isset($_GET['atualizar']) || isset($_GET['deletar']) || isset($_GET['filtrar'])) {
    $message = '';
    $bgClass = '';

    if (isset($_GET['inclusao'])) {
        switch ($_GET['inclusao']) {
            case 1:
                $message = 'Cadastro realizado com sucesso!';
                $bgClass = 'bg-success';
                break;
            case 2:
                $message = 'E-mail já cadastrado. Por favor, utilize um e-mail diferente.';
                $bgClass = 'bg-danger';
                break;
            case 0:
                $message = 'Erro ao realizar o cadastro!';
                $bgClass = 'bg-danger';
                break;
        }
    } elseif (isset($_GET['atualizar'])) {
        switch ($_GET['atualizar']) {
            case 1:
                $message = 'Cadastro atualizado com sucesso!';
                $bgClass = 'bg-success';
                break;
            case 2:
                $message = 'Email duplicado, insira outro e-mail!';
                $bgClass = 'bg-danger';
                break;
            case 0:
                $message = 'Erro ao atualizar o cadastro!';
                $bgClass = 'bg-danger';
                break;
        }
    } elseif (isset($_GET['deletar'])) {
        switch ($_GET['deletar']) {
            case 1:
                $message = 'Usuário atualizado com sucesso!';
                $bgClass = 'bg-success';
                break;
            case 2:
                $message = 'Erro ao deletar o usuário!';
                $bgClass = 'bg-danger';
                break;
            case 0:
                $message = 'Usuário não encontrado!';
                $bgClass = 'bg-danger';
                break;
        }
    } elseif (isset($_GET['filtrar']) && $_GET['filtrar'] == 0) {
        $message = 'Usuário não encontrado!';
        $bgClass = 'bg-danger';
    }

    if ($message) {
        echo "<div class='$bgClass pt-2 text-white d-flex justify-content-center'>
                <h4>$message</h4>
              </div>";
    }
}
?>
   
</div>
<?php include ("./includes/footer.php")?>