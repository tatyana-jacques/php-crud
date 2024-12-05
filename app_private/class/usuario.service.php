<?php

    class UsuarioService{
        private $conexao;
        private $usuario;

        //Tipagem do parâmetro recebido como medida de segurança
        public function __construct(Conexao $conexao, Usuario $usuario){
            //Recebe o método para fazer a conexão com PDO e o objeto usuário.
            $this ->conexao = $conexao->conectar();
            $this->usuario = $usuario;

        }
        
        //create
        public function inserir(){
            //Possui o método try e catch para o caso de problemas de e-mail repetido.
            try{
                $query = 'INSERT INTO usuarios(nome,email,senha) VALUES(:nome, :email, :senha)';
                //O método prepare serve para evitar SQL Injections.
                $stmt = $this->conexao->prepare($query);
                
                //Hashing da senha antes de salvar no banco de dados
                $senhaHashed = password_hash($this->usuario->getSenha(), PASSWORD_DEFAULT);
                
                //Associa os valores dos parâmetros da consulta
                $stmt->bindValue(':nome', $this->usuario->getNome());
                $stmt->bindValue(':email', $this->usuario->getEmail());
                $stmt->bindValue(':senha', $senhaHashed);
                // Executa a consulta
                $stmt->execute();
                header('Location: feedback.php?inclusao=1');     
            }
            catch (PDOException $e) {
                // Verifica se o erro é de duplicidade de e-mail (código de erro 23000)
                if ($e->getCode() == 23000) {
                    header('Location: feedback.php?inclusao=2');
                } else {
                    header('Location: feedback.php?inclusao=0');
                }
            }
        }

        //read
        public function recuperar(){
            $query = 'SELECT id, nome, email, data_criacao FROM usuarios';
            $stmt = $this->conexao->prepare($query);
            $stmt ->execute();
            //Retorna não um Array de Arrays, mas um Array de objetos.
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function recuperarPorEmail($email) {
            try {
                $query = 'SELECT id, nome, email, senha, data_criacao FROM usuarios WHERE email = :email';
                $stmt = $this->conexao->prepare($query);
                // Associa o valor de $email ao parâmetro :email
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                // Executa a consulta
                $stmt->execute();
                // Obtém o resultado como um objeto
                $resultado = $stmt->fetch(PDO::FETCH_OBJ);
                // Verifica se o usuário foi encontrado
                if ($resultado) {
                    // Define os atributos do objeto usuário
                    $this->usuario->setId($resultado->id);
                    $this->usuario->setNome($resultado->nome);
                    $this->usuario->setEmail($resultado->email);
                    $this->usuario->setDataCriacao($resultado->data_criacao);
                    // Inicia a sessão e armazena o objeto usuário na sessão
                    session_start();
                    $_SESSION['usuario'] = $this->usuario;
                    // Redireciona para editForm.php
                    header('Location: editForm.php');
                    
                } else {
                    header('Location: feedback.php?filtrar=0');
                }
            } catch (PDOException $e) {
                echo "Erro ao buscar o usuário: " . $e->getMessage();
            }
        }

        //update
        public function atualizar(){
            try{
                date_default_timezone_set('America/Sao_Paulo');
                $query = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, data_criacao = :data_criacao 
                WHERE id = :id";
                $stmt = $this->conexao->prepare($query);

                // Hashing da senha antes de salvar no banco de dados
                $senhaHashed = password_hash($this->usuario->getSenha(), PASSWORD_DEFAULT);
            
                // Vincula os valores aos placeholders
                $stmt->bindValue(':id', $this->usuario->getId(), PDO::PARAM_INT);
                $stmt->bindValue(':nome', $this->usuario->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(':email', $this->usuario->getEmail(), PDO::PARAM_STR);
                $stmt->bindValue(':senha', $senhaHashed, PDO::PARAM_STR);
                $stmt->bindValue(':data_criacao', date('Y-m-d H:i:s'), PDO::PARAM_STR);
            
                // Executa a consulta e retorna o resultado
                $stmt->execute();
                header('Location: feedback.php?atualizar=1');
            }

            catch (PDOException $e) {
                // Verifica se o erro é e-mail duplicado (código de erro 23000)
                if ($e->getCode() == 23000) {
                    header('Location: feedback.php?atualizar=2');
                } else {
                    header('Location: feedback.php?atualizar=0');
                }
            }
        }

        //delete
        public function remover($email){
            try{
                    $query = 'SELECT email FROM usuarios WHERE email = :email';
                    $stmt = $this->conexao->prepare($query);
                    // Associa o valor de $email ao parâmetro :email
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    // Executa a consulta
                    $stmt->execute();
                    // Obtém o resultado como um objeto
                    $resultado = $stmt->fetch(PDO::FETCH_OBJ);   
                    if ($resultado) {
                        echo $resultado->email;
                        $query = 'DELETE FROM usuarios WHERE email = :email';
                        $stmt = $this->conexao->prepare($query);
                        // Associa o valor de $email ao parâmetro :email
                        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                        // Executa a consulta
                        $stmt->execute();
                        header('Location: feedback.php?deletar=1'); 
                    } else {
                        echo "Usuário não encontrado.";
                        header('Location: feedback.php?deletar=0');
                        return null;
                    }
                }
            catch (PDOException $e) {
                header('Location: feedback.php?deletar=2');
                return null;
            }      
        }
    }
?>