<?php
$titulo_pagina = "Ver usuário"; // Definindo nome da página

require_once './Controle/ControleBuscarUsuario.php';

include("Visao/include/header.php");
include("Visao/include/Menu.php");
include("Visao/include/MensagemDeAlerta.php");

?>

<section class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <p>Dados do usuário</p>

            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid" src="<?php
                                                if (isset($usuario['imagem']) and !empty($usuario['imagem'])) {
                                                    echo URLASSETS . "perfil/perfil_id" . $usuario['id'] . "/" . $usuario['imagem'];;
                                                } else {
                                                    echo URLASSETS . 'image/usuario.png';
                                                }
                                                ?>">
                </div>
                <div class="col-md-8">
                    <div class="text-right">
                        <button onclick="window.location.href='Home.php'" class="btn btn-outline-info btn-sm"><i class="fas fa-arrow-left"></i> Voltar</button>
                    </div>
                    <p>
                        <strong>
                            <?php echo $usuario['nome']; ?>
                        </strong>
                    </p>
                    <p class="d-flex flex-column">
                        <span>Email: <?php echo $usuario['email']; ?></span>
                        <span>Matricula: <?php echo $usuario['matricula']; ?></span>
                        <span>Telefone:
                            <?php
                            $number = $usuario['telefone'];
                            $number = "(" . substr($number, 0, 2) . ") " . substr($number, 2, -4) . "-" . substr($number, -4);
                            echo $number;
                            ?>
                        </span>
                        <span>Data de registro: <?php echo date('H\hi\m d/m/Y', strtotime($usuario['created'])); ?></span>
                    </p>
                </div>
                <?php

                ?>
            </div>
        </div>
    </div>
</section>

<?php
include("Visao/include/rodape.php");
?>