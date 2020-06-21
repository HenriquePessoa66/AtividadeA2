<?php

    require_once 'Modelo/AlertaMensagemJS.php';

    session_start();
    if(isset($_SESSION['usuarioLogado'])){
        unset($_SESSION['usuarioLogado']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        unset($_SESSION['imagem']);
    }
    $alerta = new AlertaMensagemJS();
    $_SESSION['msg'] = $alerta->alertaJavaScript("Deslogado com sucesso!", "success");
    header('location:./index.php');