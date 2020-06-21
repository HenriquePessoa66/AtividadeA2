<?php

class AlertaMensagemJS 
{
    private $DadosCor;

    public function alertaJavaScript($Texto = null, $Cor = null)
    {
        $texto = (string)$Texto;
        $cor = (string)$Cor ? $Cor : "primary"; // Cores do bootstrap

        if ($cor == "success") {
            $icone = "fas fa-check-circle";
        } elseif ($cor == "danger") {
            $icone = "fas fa-times-circle";
        } elseif ($cor == "primary") {
            $icone = "fas fa-check-circle";
        } else {
            $icone = "fas fa-exclamation-triangle";
        }

        $this->DadosCor =
            "
            <div id='mensagemCard' class='card border-{$cor} bg-{$cor} d-none'>
                <div class='card-body text-light text-center' style='position: relative; min-width: 300px !important; max-width: 350px !important;'>
                    <div onclick='fecharAgora()' class='text-right' style='position: absolute; top: 5px; right: 10px'>
                        <i class='fas fa-times' style='cursor: pointer;'></i>
                    </div>
                    <i class='{$icone} fa-2x'></i>
                    <h5 class='card-title' >{$texto}</h5>
                </div>
            </div>
            ";

        return $this->DadosCor;
    }
}