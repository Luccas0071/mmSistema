<?php

class ItemColaboradorCurso{
    private $codigo;
    private $objCurso;
    private $dataConclusao;
    private $valorRemuneracao;
    private $observacao;

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }
 
    public function getObjCurso()
    {
        return $this->objCurso;
    }

    public function setObjCurso($objCurso)
    {
        $this->objCurso = $objCurso;

        return $this;
    }
 
    public function getDataConclusao()
    {
        return $this->dataConclusao;
    }

    public function setDataConclusao($dataConclusao)
    {
        $this->dataConclusao = $dataConclusao;

        return $this;
    }
 
    public function getValorRemuneracao()
    {
        return $this->valorRemuneracao;
    }

    public function setValorRemuneracao($valorRemuneracao)
    {
        $this->valorRemuneracao = $valorRemuneracao;

        return $this;
    }
 
    public function getObservacao()
    {
        return $this->observacao;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }
}