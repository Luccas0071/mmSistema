<?php

class Curso{
    private $acao;
    private $codigo;
    private $nome;
    private $cargaHoraria;
    private $emissor;

    public function getAcao()
    {
        return $this->acao;
    }

    public function setAcao($acao)
    {
        $this->acao = $acao;

        return $this;
    }
    
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }
 
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
 
    public function getCargaHoraria()
    {
        return $this->cargaHoraria;
    }

    public function setCargaHoraria($cargaHoraria)
    {
        $this->cargaHoraria = $cargaHoraria;

        return $this;
    }
 
    public function getEmissor()
    {
        return $this->emissor;
    }

    public function setEmissor($emissor)
    {
        $this->emissor = $emissor;

        return $this;
    }


 
}