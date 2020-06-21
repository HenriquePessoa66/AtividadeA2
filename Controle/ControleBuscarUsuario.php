<?php

require_once './Modelo/DAO/ClassUsuarioDAO.php';
require_once './Modelo/AlertaMensagemJS.php';

$id = filter_input(INPUT_GET, "id", FILTER_DEFAULT);

if(!empty($id)) {
    $buscar = new ClassUsuarioDAO();
    $dados = $buscar->buscarUsuario($id);
    if ($dados) {
        $usuario = $dados;
    } else {
        $alerta = new AlertaMensagemJS();
        $_SESSION['msg'] = $alerta->alertaJavaScript("Usuário não encontrado!", "danger");
        header('Location:./Home.php');
    }

} else {
    $alerta = new AlertaMensagemJS();
    $_SESSION['msg'] = $alerta->alertaJavaScript("Usuário não encontrado!", "danger");
    header('Location:./Home.php');
}

