<?php

require_once './Modelo/DAO/ClassUsuarioDAO.php';
require_once './Modelo/AlertaMensagemJS.php';


$listar = new ClassUsuarioDAO();
$dados = $listar->allUsuarios();

if($dados) {
    $array_usuarios = $dados;
} else {
    $array_usuarios = [];
}