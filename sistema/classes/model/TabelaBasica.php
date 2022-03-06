<?php

class TabelaBasica{
    private $codigo;
    private $descricao;
    private $tipo;
    private $ordem;

 
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }
 
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
 
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
 
    public function getOrdem()
    {
        return $this->ordem;
    }

    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;

        return $this;
    }
}