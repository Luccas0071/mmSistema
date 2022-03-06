<?php

class Endereco{
    
    private $codigo;
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $complemento;
    private $uf;
    private $municipio;

    public function getCodigo()
    {
        return $this->codigo;
    }
 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

     
    public function getCep()
    {
        return $this->cep;
    }
 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

     
    public function getRua()
    {
        return $this->rua;
    }
 
    public function setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }

     
    public function getNumero()
    {
        return $this->numero;
    }
 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

     
    public function getBairro()
    {
        return $this->bairro;
    }
 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

     
    public function getComplemento()
    {
        return $this->complemento;
    }
 
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

     
    public function getUf()
    {
        return $this->uf;
    }
 
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

     
    public function getMunicipio()
    {
        return $this->municipio;
    }
 
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }
}