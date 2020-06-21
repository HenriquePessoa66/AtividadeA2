<?php

class UploadImagem
{
    private $DadosImagem;
    private $Diretorio;
    private $NomeImg;
    private $Resultado;
    private $Imagem;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function atualizarImagem(array $Imagem, $Diretorio, $NomeImg)
    {

        $this->DadosImagem = $Imagem;
        $this->Diretorio = $Diretorio . '/';
        $this->NomeImg = $NomeImg;
        $this->validarImagem();
    }

    private function validarImagem()
    {
        switch ($this->DadosImagem['type']): case 'image/jpeg':
            case 'image/pjpeg':
                $this->Imagem = imagecreatefromjpeg($this->DadosImagem['tmp_name']);
                break;

            case 'image/png':
            case 'image/x-png':
                $this->Imagem = imagecreatefrompng($this->DadosImagem['tmp_name']);
                break;
        endswitch;
        if ($this->Imagem) {

            $this->valDiretorio();
        } else {

            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A extensão da imagem é inválida! Selecione uma imagem JPEG ou PNG.</div>";
            $this->Resultado = false;
        }
    }


    private function valDiretorio()
    {
        if (!file_exists($this->Diretorio) && !is_dir($this->Diretorio)) {
            mkdir($this->Diretorio, 0755);
        }
        $this->realizarUpload();
    }


    private function realizarUpload()
    {
        if (move_uploaded_file($this->DadosImagem['tmp_name'], $this->Diretorio . $this->NomeImg)) {

            $this->Resultado = true;
        } else {

            $this->Resultado = false;
        }
    }
}