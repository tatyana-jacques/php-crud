# CRUD COM PHP

## Tecnologias

- HTML
- CSS
- Bootstrap
- PHP
- MySQL

## Sobre

Este projeto foi desenvolvido durante a disciplina Desenvolvimento Web da graduação em Análise e Desenvolvimento de Sistemas do Claretiano - Centro Universitário. Seu objetivo foi o desenvolvimento de um cadastro de usuários implementando as funcionalidades CRUD utilizando PHP e MySQL.

Para o desenvolvimento desse projeto foram utilizados os módulos Apache e MySQL do servidor local XAMPP. O banco de dados foi acessado por meio da ferramenta "phpmyadmin".

Trata de um trabalho focado no backend. Contudo, foi utilizado o framework Bootstrap para uma estilização mínima das páginas.

### Banco de dados

Query para a criação do banco de dados "usuario_db" e da tabela "usuarios":
![Print de phpmyadmin](/assets/banco_dados1.png)

Realização de registros no banco de dados:
![Print de phpmyadmin](/assets/registros_banco_dados.png)

### Aplicação em PHP

Para a criação da aplicação em PHP foi utilizada a interface PDO (PHP Data Objects), que consiste em uma padronização para a forma de conexão com o banco de dados tendo em vista a prevenção contra SQL Injections.

O projeto foi estruturado em duas pastas principais: 1. O diretório “app_private”, contendo classes e arquivos que devem ficar armazenados de forma protegida e aos quais os arquivos públicos farão solicitações; 2. E o diretório “app_public”, contendo os arquivos a serem armazenados no servidor de forma mais exposta.

A lógica para a realização do CRUD (create, read, update, delete) está contida na classe UsuarioService, no arquivo “usuario.service.php”. Essa classe também contém o método recuperarPorEmail, que busca, no banco de dados, um usuário a partir de seu e-mail. Para a realização de seus métodos, a classe UsuarioService possui um método construtor que recebe um objeto do tipo Conexao e um objeto do tipo Usuario, devidamente tipados, para evitar inserções inapropriadas.

É o arquivo “usuario.controllet.php” que controla a inserção, modificação, remoção e persistência dos registros no banco de dados. Nesse script foi criada a variável $acao, cujo valor recebido define a operação a ser realizada.

### Páginas

![Print de phpmyadmin](/assets/index_pagina.png)

![Print de phpmyadmin](/assets/listar.png)

![Print de phpmyadmin](/assets/editar1.png)

![Print de phpmyadmin](/assets/editar2.png)

![Print de phpmyadmin](/assets/deletar.png)
