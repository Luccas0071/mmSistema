<?php

class Colaborador{

    private $acao;
    private $codigo;
    private $nome;
    private $cpf;
    private $rg;
    private $dataNascimento;
    private $dddTelefone;
    private $telefone;
    private $dddCelular;
    private $celular;
    private $objCargo;
    private $email;
    private $salario;
    private $objEndereco;
    
    private $collectionItemCurso = array();

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

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getDddTelefone()
    {
        return $this->dddTelefone;
    }

    public function setDddTelefone($dddTelefone)
    {
        $this->dddTelefone = $dddTelefone;

        return $this;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getDddCelular()
    {
        return $this->dddCelular;
    }

    public function setDddCelular($dddCelular)
    {
        $this->dddCelular = $dddCelular;

        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function getObjCargo()
    {
        return $this->objCargo;
    }

    public function setObjCargo($objCargo)
    {
        $this->objCargo = $objCargo;

        return $this;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    public function getObjEndereco()
    {
        return $this->objEndereco;
    }

    public function setObjEndereco($objEndereco)
    {
        $this->objEndereco = $objEndereco;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getAcao()
    {
        return $this->acao;
    }
 
    public function setAcao($acao)
    {
        $this->acao = $acao;

        return $this;
    }

    public function getCollectionItemCurso()
    {
        return $this->collectionItemCurso;
    }

    public function setCollectionItemCurso($collectionItemCurso)
    {
        $this->collectionItemCurso = $collectionItemCurso;

        return $this;
    }
}