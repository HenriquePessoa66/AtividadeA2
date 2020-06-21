<?php
$titulo_pagina = "Editar Perfil";

require_once 'Controle/ControleEditarUsuario.php';

include("Visao/include/header.php");
include("Visao/include/Menu.php");
include("Visao/include/MensagemDeAlerta.php");
?>

<section class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <p>Editar Perfil</p>

            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid" src="<?php 
                    if(isset($_SESSION['imagem']) and !empty($_SESSION['imagem'])){
                         echo URLASSETS . "perfil/perfil_id". $_SESSION['idUsuarioLogado'] . "/" . $_SESSION['imagem'];
                     } else {
                         echo URLASSETS . 'image/perfil.jpg';
                     } 
                     ?>">
                </div>
                <div class="col-md-8">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idUsuario" value="<?php echo $usuario['id']; ?>">
                        <div class="input-group flex-nowrap mb-3 border-r-none">
                            <div class="input-group-prepend border-r-none">
                                <span class="input-group-text border-r-none" id="inputNome">
                                    <i class="fas fa-user-alt"></i>
                                </span>
                            </div>
                            <input name="nome" type="text" class="form-control border-r-none" placeholder="Nome" aria-label="Nome" aria-describedby="inputNome" maxlength="60" min="4" required value="<?php echo $usuario['nome']; ?>">
                        </div>
                        <div class="input-group flex-nowrap my-3 border-r-none">
                            <div class="input-group-prepend border-r-none">
                                <span class="input-group-text border-r-none" id="inputEmail">
                                    <i class="fas fa-at"></i>
                                </span>
                            </div>
                            <input name="email" type="email" class="form-control border-r-none" placeholder="Email" aria-label="email" aria-describedby="inputEmail" maxlength="99" min="4" required value="<?php echo $usuario['email']; ?>">
                        </div>
                        <div class="form-row mb-3">
                            <div class="input-group col flex-nowrap border-r-none">
                                <div class="input-group-prepend border-r-none">
                                    <span class="input-group-text border-r-none" id="inputTelefone">
                                        <i class="fas fa-mobile-alt"></i>
                                    </span>
                                </div>
                                <input name="telefone" type="text" class="telefone form-control border-r-none" placeholder="Telefone" aria-label="telefone" aria-describedby="inputTelefone" maxlength="16" min="11" required value="<?php echo $usuario['telefone']; ?>">
                            </div>
                            <div class="input-group col flex-nowrap border-r-none">
                                <div class="input-group-prepend border-r-none">
                                    <span class="input-group-text border-r-none" id="inputMatricula">
                                        <i class="fas fa-id-card-alt"></i>
                                    </span>
                                </div>
                                <input name="matricula" type="text" class="matricula form-control border-r-none" placeholder="Matricula" aria-label="matricula" aria-describedby="inputMatricula" maxlength="9" min="9" value="<?php echo $usuario['matricula']; ?>">
                            </div>
                        </div>
                        <div class="custom-file mb-3">
                            <input name="imagem" type="file" class="" id="customFile">
                        </div>
                        <div class="input-group flex-nowrap mb-3 border-r-none">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-r-none" id="inputSenha">
                                    <i class="fas fa-fingerprint"></i>
                                </span>
                            </div>
                            <input name="senha" type="password" class="form-control border-r-none" placeholder="Nova Senha" aria-label="Senha" aria-describedby="inputSenha" maxlength="16" min="4">
                        </div>
                        <button type="submit" class="btn btn-info btn-block border-r-none">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("Visao/include/rodape.php");
?>