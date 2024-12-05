<?php
    require "../app_private/class/usuario.model.php";
    require "../app_private/class/usuario.service.php";
    require "../app_private/class/conexao.php";

    $acao = isset($_GET ['acao']) ? $_GET['acao']: $acao;

    if($acao == 'inserir'){
        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);

        $conexao = new Conexao();

        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarioService->inserir();
    }
    else if($acao == 'recuperar'){
        $usuario = new Usuario();
        $conexao = new Conexao();

        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarios = $usuarioService->recuperar();
    }
    else if($acao == 'recuperarPorEmail'){
        $usuario = new Usuario();
        $usuario->setEmail($_POST['email']);
        $conexao = new Conexao();

        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarioEdit = $usuarioService->recuperarPorEmail($_POST['email']);
        
    }
    else if($acao == 'atualizar'){
        $usuario = new Usuario();
        $usuario->setId($_POST['id']);
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setDataCriacao(date('Y-m-d'));

        $conexao = new Conexao();

        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarioService->atualizar();    
    }

    else if($acao == 'remover'){
        $usuario = new Usuario();
        $usuario->setEmail($_POST['email']);
        $conexao = new Conexao();

        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarioEdit = $usuarioService->remover($_POST['email']);
    }?>