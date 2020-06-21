<?php
$titulo_pagina = "Perfil"; // Definindo nome da página

include("Visao/include/header.php");
include("Visao/include/Menu.php");
include("Visao/include/MensagemDeAlerta.php");
?>

<section class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <p>Perfil</p>

            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid" src="<?php 
                    if(isset($_SESSION['imagem'])){
                         echo URLASSETS . "perfil/perfil_id". $_SESSION['idUsuarioLogado'] . "/" . $_SESSION['imagem'];
                     } else {
                         echo URLASSETS . 'image/perfil.jpg';
                     } 
                     ?>">
                </div>
                <div class="col-md-8">
                    <p>
                        <strong>
                            <?php echo $_SESSION['nome'] ? $_SESSION['nome'] : "Nome Usuário"; ?>
                        </strong>
                    </p>
                    <p>
                        <?php echo $_SESSION['email'] ? $_SESSION['email'] : "Email Usuário"; ?>
                    </p>
                    <button onclick="window.location.href='EditarPerfil.php?id=<?php echo $_SESSION['idUsuarioLogado']; ?>'" class="btn btn-outline-warning">
                        Editar perfil
                    </button>
                    <button onclick="window.location.href='ExcluirConta.php'" class="btn btn-outline-danger">Excluir Conta</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("Visao/include/rodape.php");
?>