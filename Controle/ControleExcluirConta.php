<?php
session_start();

require_once '../Modelo/DAO/ClassUsuarioDAO.php';
require_once '../Modelo/AlertaMensagemJS.php';

$id = filter_input(INPUT_GET, "id", FILTER_DEFAULT);

if (!empty($id)) {
    $buscar = new ClassUsuarioDAO();
    $resultado = $buscar->excluirUsuario($id);
    if ($resultado) {
        unset($_SESSION['usuarioLogado']);
        unset($_SESSION['idUsuarioLogado']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        unset($_SESSION['imagem']);

        $alerta = new AlertaMensagemJS();
        $_SESSION['msg'] = $alerta->alertaJavaScript("Conta deletada com sucesso!", "success");
        header('Location:../index.php');
    } else {
        $alerta = new AlertaMensagemJS();
        $_SESSION['msg'] = $alerta->alertaJavaScript("Não foi possível excluir sua conta.", "danger");
        header('Location:../Home.php');
    }
} else {
    $alerta = new AlertaMensagemJS();
    $_SESSION['msg'] = $alerta->alertaJavaScript("Usuário não encontrado!", "danger");
    header('Location:../Home.php');
}
