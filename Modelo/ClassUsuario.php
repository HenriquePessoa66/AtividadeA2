<?php

class ClassUsuario {
    private $idUsuario;
    private $nome;
    private $imagem;
    private $email;
    private $matricula;
    private $telefone;
    private $senha;
    private $created;
    private $modified;
     
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getEmail() {
        return $this->email;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCreated() {
        return date('Y-m-d H:i:s');
    }

    function getModified() {
        return date('Y-m-d H:i:s');
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setTelefone($telefone) {
        $telefone = str_replace("-", "", str_replace(") ", "", str_replace("(", "", $telefone)));
        $this->telefone = $telefone;
    }

    function setSenha($senha) {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }
}
