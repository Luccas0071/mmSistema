<?php

include_once '../classes/model/tabelaBasica.php';
include_once '../classes/model/colaborador.php';
include_once '../classes/model/itemColaboradorCurso.php';
include_once '../classes/model/endereco.php';

class ColaboradorForm {

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
    private $cargo;
    private $email;
    private $salario;
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $complemento;
    private $uf;
    private $municipio;
    
    private $collectionItemCurso = array();
 
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

    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }
 
    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

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
 
    public function getSalario()
    {
        return $this->salario;
    }

    public function setSalario($salario)
    {
        $this->salario = $salario;

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

    public function getCollectionItemCurso()
    {
        return $this->collectionItemCurso;
    }

    public function setCollectionItemCurso($collectionItemCurso)
    {
        $this->collectionItemCurso = $collectionItemCurso;

        return $this;
    }

    public function validate(){

    }

    public function transfereRequestForm($request){

        print_r("FORM");
        print_r($request);
        exit;

        $this->setAcao($request['acao']);
        $this->setCodigo($request['codigoCurso']);
        $this->setNome($request['nome']);
        $this->setCpf($request['cpf']);
        $this->setRg($request['rg']);
        $this->setDataNascimento($request['dataNascimento']);
        $this->setDddTelefone($request['dddTelefone']);
        $this->setTelefone($request['telefone']);
        $this->setDddCelular($request['dddCelular']);
        $this->setCelular($request['celular']);
        $this->setCargo($request['cargo']);
        $this->setEmail($request['email']);
        $this->setSalario($request['salario']);

        $this->setCep($request['cep']);
        $this->setRua($request['rua']);
        $this->setNumero($request['numero']);
        $this->setBairro($request['bairro']);
        $this->setComplemento($request['complemento']);
        $this->setUf($request['uf']);
        $this->setMunicipio($request['municipio']);

        $contadorCurso = 0;
        $qtdCurso = $request['qtdCurso'];
        $collectionItemCurso = array();

        while($contadorCurso <= $qtdCurso) {
            $codigoItemCurso    = 'codigoItemCurso' .$contadorCurso;
            $curso              = 'curso'           .$contadorCurso;
            $dataConclusao      = 'dataConclusao'   .$contadorCurso;
            $valorRemoneracao   = 'valor'           .$contadorCurso;
            $observacao         = 'observacao'      .$contadorCurso;

            if($curso != ""){
                $objItemCurso = new ItemColaboradorCurso();

                $objItemCurso->setCodigo($request[$codigoItemCurso]);

                $objItemCurso->setObjCurso(new Curso());
                $objItemCurso->getObjCurso()->setCodigo($request[$curso]);

                $objItemCurso->setDataConclusao($request[$dataConclusao]);
                $objItemCurso->setValorRemuneracao($request[$valorRemoneracao]);
                $objItemCurso->setObservacao($request[$observacao]);
                
                array_push($collectionItemCurso, $objItemCurso);
            }
            $contadorCurso++;
        }
        $this->setCollectionItemCurso($collectionItemCurso);
    }

    public function transfereFormModel(){

        $objColaborador = new Colaborador();

        $objColaborador->setAcao($this->getAcao());
        $objColaborador->setCodigo($this->getCodigo());
        $objColaborador->setNome($this->getNome());
        $objColaborador->setCpf($this->getCpf());
        $objColaborador->setRg($this->getRg());
        $objColaborador->setDataNascimento($this->getDataNascimento());
        $objColaborador->setDddTelefone($this->getDddTelefone());
        $objColaborador->setTelefone($this->getTelefone());
        $objColaborador->setDddCelular($this->getDddCelular());
        $objColaborador->setCelular($this->getCelular());

        $objColaborador->setObjCargo(new TabelaBasica());
        $objColaborador->getObjCargo()->setCodigo($this->getCargo());

        $objColaborador->setEmail($this->getEmail());
        $objColaborador->setSalario($this->getSalario());
        
        $objColaborador->setObjEndereco(new Endereco());
        $objColaborador->getObjEndereco()->setCep($this->getCep());
        $objColaborador->getObjEndereco()->setRua($this->getRua());
        $objColaborador->getObjEndereco()->setNumero($this->getNumero());
        $objColaborador->getObjEndereco()->setBairro($this->getBairro());
        $objColaborador->getObjEndereco()->setComplemento($this->getComplemento());
        $objColaborador->getObjEndereco()->setUf($this->getUf());
        $objColaborador->getObjEndereco()->setMunicipio($this->getMunicipio());

        $objColaborador->setCollectionItemCurso($this->getCollectionItemCurso());

        return $objColaborador;
    }

   
}