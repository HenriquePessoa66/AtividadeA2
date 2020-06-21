<?php
session_start();

require_once '../Modelo/ClassUsuario.php';
require_once '../Modelo/DAO/ClassUsuarioDAO.php';
require_once '../Modelo/AlertaMensagemJS.php';

$nome = @$_POST['nome'];
$email = @$_POST['email'];
$matricula = @$_POST['matricula'];
$telefone = @$_POST['telefone'];
$senha = @$_POST['senha'];

if(!empty($nome) and !empty($email) and !empty($matricula) and !empty($telefone) and !empty($senha)) {
    $novoUsuario = new ClassUsuario();
    $novoUsuario->setNome($nome);
    $novoUsuario->setEmail($email);
    $novoUsuario->setMatricula($matricula);
    $novoUsuario->setTelefone($telefone);
    $novoUsuario->setSenha($senha);


    $classUsuarioDAO = new ClassUsuarioDAO();
    $verificaEmail = $classUsuarioDAO->verificarUsuario($email);
    if($verificaEmail > 0){
        $alerta = new AlertaMensagemJS();
        $_SESSION['msg'] = $alerta->alertaJavaScript("Email já cadastrado, cadastre outro ou faça login.", "info");
        header('Location:../Cadastro.php');
    } else {
        $usuario = $classUsuarioDAO->cadastrar($novoUsuario);
        if ($usuario == TRUE) {
            $alerta = new AlertaMensagemJS();
            $_SESSION['msg'] = $alerta->alertaJavaScript("Cadastro realizado com sucesso!", "success");
            header('Location:../index.php');
        } else {
            $alerta = new AlertaMensagemJS();
            $_SESSION['msg'] = $alerta->alertaJavaScript("Error! Não foi possível completar o cadastro.", "danger");
            header('Location:../Cadastro.php');
        }
    }

} else {
    echo "aqui";
    $alerta = new AlertaMensagemJS();
    $_SESSION['msg'] = $alerta->alertaJavaScript("Necessário preencher todos os campos.", "warning");
    header('Location:../Cadastro.php');
}