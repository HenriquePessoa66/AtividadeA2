<?php
include("variaveis.php");
if (isset($_SESSION['usuarioLogado'])) {
    header('location:Home.php');
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo URLASSETS ?>css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo URLASSETS ?>css/all.css">

    <link rel="stylesheet" href="<?php echo URLASSETS ?>css/login.css">
    <link rel="stylesheet" href="<?php echo URLASSETS ?>css/alerta.css">

    <title>Cadastro - PDO</title>
</head>

<body>
    <?php
    include("Visao/include/MensagemDeAlerta.php");
    ?>
    <section class="container-fluid">
        <div id="LoginCadastro_container" class="row justify-content-center align-itens-center">
            <div class="col-md-6 col-lg-4 col-xl-4 pt-5">
                <div class="card border-0 border-r-none">
                    <div id="logo_LoginCadastro" class="card-header text-center border-0 bg-secondary border-r-none">
                        <h1 class="text-light mt-3">
                            CADASTRO
                        </h1>
                        <div id="botao_LoginCadastro">
                            <button onclick="window.location.href='index.php'" class="btn btn-info btn-sm">LOGIN</button>
                        </div>

                    </div>
                    <div class="card-body border border-light shadow">
                        <form action="Controle/ControleUsuario.php" method="post">
                            <div class="input-group flex-nowrap my-3 border-r-none">
                                <div class="input-group-prepend border-r-none">
                                    <span class="input-group-text border-r-none" id="inputNome">
                                        <i class="fas fa-user-alt"></i>
                                    </span>
                                </div>
                                <input name="nome" type="text" class="form-control border-r-none" placeholder="Nome" aria-label="Nome" aria-describedby="inputNome" maxlength="60" min="4" required autofocus>
                            </div>
                            <div class="input-group flex-nowrap my-3 border-r-none">
                                <div class="input-group-prepend border-r-none">
                                    <span class="input-group-text border-r-none" id="inputEmail">
                                        <i class="fas fa-at"></i>
                                    </span>
                                </div>
                                <input name="email" type="email" class="form-control border-r-none" placeholder="Email" aria-label="email" aria-describedby="inputEmail" maxlength="99" min="4" required>
                            </div>
                            <div class="form-row mb-3">
                                <div class="input-group col flex-nowrap border-r-none">
                                    <div class="input-group-prepend border-r-none">
                                        <span class="input-group-text border-r-none" id="inputTelefone">
                                            <i class="fas fa-mobile-alt"></i>
                                        </span>
                                    </div>
                                    <input name="telefone" type="text" class="telefone form-control border-r-none" placeholder="Telefone" aria-label="telefone" aria-describedby="inputTelefone" maxlength="16" min="11" required>
                                </div>
                                <div class="input-group col flex-nowrap border-r-none">
                                    <div class="input-group-prepend border-r-none">
                                        <span class="input-group-text border-r-none" id="inputMatricula">
                                            <i class="fas fa-id-card-alt"></i>
                                        </span>
                                    </div>
                                    <input name="matricula" type="text" class="matricula form-control border-r-none" placeholder="Matricula" aria-label="matricula" aria-describedby="inputMatricula" maxlength="9" min="9">
                                </div>
                            </div>
                            <div class="input-group flex-nowrap mb-3 border-r-none">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-r-none" id="inputSenha">
                                        <i class="fas fa-fingerprint"></i>
                                    </span>
                                </div>
                                <input name="senha" type="password" class="form-control border-r-none" placeholder="Senha" aria-label="Senha" aria-describedby="inputSenha" maxlength="16" min="4" required>
                            </div>
                            <button type="submit" class="btn btn-info btn-block border-r-none">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo URLASSETS ?>js/jquery.min.js">
    </script>
    <script src="<?php echo URLASSETS ?>js/bootstrap.bundle.min.js">
    </script>

    <script src="<?php echo URLASSETS ?>js/jquery.mask.js"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(document).ready(function() {
            $('.date').mask('11/11/1111');
            $('.year').mask('0000/0000');
            $('.time').mask('00:00:00');
            $('.value').mask('0.000,00', {
                reverse: true
            });
            $('.date_time').mask('00/00/0000 00:00:00');
            $('.cep').mask('00000-000');
            $('.zip_code').mask('00000-000');
            $('.matricula').mask('000000000');
            $('.telefone').mask('(00) 00000-0000');
            $('.cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('.money').mask('000.000.000.000.000,00', {
                reverse: true
            });
        });
    </script>

    <?php
    if (isset($_SESSION['alert'])) {
        ?>
        <script>
            var mensagemCard = document.getElementById('mensagemCard');

            window.setTimeout(function() {
                fadeIn(mensagemCard, 0.5);
                fecharMensagem();
            }, 0);

            function fecharMensagem() {
                window.setTimeout(function() {
                    fadeOut(mensagemCard, 1);
                }, 5000)
            }


            function fecharAgora() {
                fadeOut(mensagemCard, 0.5)
            }


            function fadeIn(element, time) {
                processa(element, time, 0, 100);
            }

            function fadeOut(element, time) {
                processa(element, time, 100, 0);
            }

            function processa(element, time, initial, end) {
                var increment;
                var intervalo;
                var opc;

                if (initial == 0) {
                    increment = 2;
                    element.classList.remove('d-none');
                } else {
                    increment = -3;
                }

                opc = initial;

                intervalo = setInterval(function() {
                    if ((opc == end)) {
                        if (end == 0) {
                            element.classList.add('d-none');
                        }
                        clearInterval(intervalo);
                    } else {
                        if (end == 0) {
                            opc += increment;
                            if (element.style.opacity >= 0) {
                                element.style.opacity = opc / 100;
                            } else {
                                element.classList.add('d-none');
                            }
                            element.style.filter = "alpha(opacity=" + opc + ")";
                            element.style.right = -0.1 + "px";
                        } else {
                            opc += increment;
                            element.style.opacity = opc / 100;
                            element.style.filter = "alpha(opacity=" + opc + ")";
                            element.style.right = (opc - 40) + "px";
                        }
                    }
                }, time * 10);
            }
        </script>

        <?php
        unset($_SESSION['alert']);
    }
    ?>


</body>

</html>