<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $data_criacao;

    public function getId(){return $this -> id;}

    public function  setId($id){$this->id = $id;}

    public function  getNome(){return $this -> nome;}
    
    public function  setNome($nome){ $this->nome = $nome;}
    
    public function  getEmail(){return $this -> email;}
    
    public function  setEmail($email){$this->email = $email;}
    
    public function  getSenha(){return $this -> senha;}
    
    public function  setSenha($senha){$this->senha = $senha;}
    
    public function  getDataCriacao(){return $this -> data_criacao;}
    
    public function  setDataCriacao($data_criacao){$this->data_criacao = $data_criacao;}
}
?>