<?php

require_once 'Conexao.php';
class ClassUsuarioDAO {

    public function cadastrar(ClassUsuario $cadastrarUsuario) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO usuarios (nome, email, matricula, telefone, senha, created) values (?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarUsuario->getNome());
            $stmt->bindValue(2, $cadastrarUsuario->getEmail());
            $stmt->bindValue(3, $cadastrarUsuario->getMatricula());
            $stmt->bindValue(4, $cadastrarUsuario->getTelefone());
            $stmt->bindValue(5, $cadastrarUsuario->getSenha());
            $stmt->bindValue(6, $cadastrarUsuario->getCreated());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function atualizarUsuario(ClassUsuario $atualizarUsuario, $idUsuario) {
        try {
            $pdo = Conexao::getInstance();
            if(!empty($atualizarUsuario->getSenha())){
                $sql = "UPDATE usuarios SET nome=:nome, email=:email, matricula=:matricula, telefone=:telefone, imagem=:imagem, senha=:senha, modified=:modified WHERE id=:id";
            } else {
                $sql = "UPDATE usuarios SET nome=:nome, email=:email, matricula=:matricula, telefone=:telefone, imagem=:imagem, modified=:modified WHERE id=:id";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $idUsuario);
            $stmt->bindValue(':nome', $atualizarUsuario->getNome());
            $stmt->bindValue(':email', $atualizarUsuario->getEmail());
            $stmt->bindValue(':matricula', $atualizarUsuario->getMatricula());
            $stmt->bindValue(':telefone', $atualizarUsuario->getTelefone());
            $stmt->bindValue(':imagem', $atualizarUsuario->getImagem());
            if(!empty($atualizarUsuario->getSenha())){
                $stmt->bindValue(':senha', $atualizarUsuario->getSenha());
            }
            $stmt->bindValue(':modified', $atualizarUsuario->getModified());
           
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function buscarUsuario($id){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome, email, matricula, telefone, imagem, created FROM usuarios WHERE id=:id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function excluirUsuario($id){
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM usuarios WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function verificarUsuario($email){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT email FROM usuarios WHERE email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $email);

            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function login(ClassUsuario $loginUsuario) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM usuarios WHERE email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $loginUsuario->getEmail());

            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function allUsuarios() {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome, email FROM usuarios";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}
