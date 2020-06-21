<?php
$titulo_pagina = "Excluir Conta";

include("Visao/include/header.php");
include("Visao/include/Menu.php");
include("Visao/include/MensagemDeAlerta.php");
?>

<section class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <p>Excluir Conta</p>
            <p>Sua conta será excluida definitivamente, desesa continuar?</p>
            <div class="row">
                <div class="col-md-8">
                    <button onclick="window.location.href='Home.php'" class="btn btn-outline-success">
                        Cancelar
                    </button>
                    <button onclick="window.location.href='./Controle/ControleExcluirConta.php?id=<?php echo $_SESSION['idUsuarioLogado']; ?>'" class="btn btn-outline-danger">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("Visao/include/rodape.php");
?>