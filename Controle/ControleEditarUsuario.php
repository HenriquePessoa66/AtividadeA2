<?php

require_once './Modelo/ClassUsuario.php';
require_once './Modelo/DAO/ClassUsuarioDAO.php';
require_once './Modelo/AlertaMensagemJS.php';
require_once './Modelo/UploadImagem.php';

$dados_editar = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(isset($dados_editar['nome'])) {

    $atualizarUsuario = new ClassUsuario();
    if(empty($dados_editar['senha'])) {
        unset($dados_editar['senha']);
    } else {
        $atualizarUsuario->setSenha($dados_editar['senha']);
    }

    if (!empty($_FILES['imagem'])) {

        $data = ('Y-m-d H:i:s');
        $imagemUp = $_FILES['imagem'];
        $nomeImagem = $imagemUp['name'];
        $diretorio = "assets/perfil/perfil_Id" . $dados_editar['idUsuario'];
        
        $upImg = new UploadImagem();
        $upImg->atualizarImagem($imagemUp, $diretorio, $nomeImagem);
        if ($upImg->getResultado()) {
            $atualizarUsuario->setImagem($nomeImagem);
        } else {
            $alerta = new AlertaMensagemJS();
            $_SESSION['msg'] = $alerta->alertaJavaScript("Error! Perfil não atualizado.", "danger");
            header('Location:./Home.php');
        }
    } else {
        $alerta = new AlertaMensagemJS();
        $_SESSION['msg'] = $alerta->alertaJavaScript("Error! Perfil não atualizado.", "danger");
        header('Location:./Home.php');
    }

    $atualizarUsuario->setNome($dados_editar['nome']);
    $atualizarUsuario->setEmail($dados_editar['email']);
    $atualizarUsuario->setMatricula($dados_editar['matricula']);
    $atualizarUsuario->setTelefone($dados_editar['telefone']);
    
    $editarUsuario = new ClassUsuarioDAO();
    $resultado = $editarUsuario->atualizarUsuario($atualizarUsuario, $dados_editar['idUsuario']);
    if($resultado){
        $dados = $editarUsuario->buscarUsuario($dados_editar['idUsuario']);
        session_start();

        $_SESSION['usuarioLogado'] = true;
        $_SESSION['idUsuarioLogado'] = $dados['id'];
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['email'] = $dados['email'];
        $_SESSION['imagem'] = $dados['imagem'];

        $alerta = new AlertaMensagemJS();
        $_SESSION['msg'] = $alerta->alertaJavaScript("Perfil atualizado com sucesso!", "success");
        $_SESSION['alert'] = "ok";
        header('Location:./Perfil.php');
    } else {
        $alerta = new AlertaMensagemJS();
        $_SESSION['msg'] = $alerta->alertaJavaScript("Error! Perfil não atualizado.", "danger");
        header('Location:./Perfil.php');
    }
}

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

