<script src="<?php echo URLASSETS ?>js/jquery.min.js">
</script>
<script src="<?php echo URLASSETS ?>js/bootstrap.bundle.min.js">
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

</body>

</html>