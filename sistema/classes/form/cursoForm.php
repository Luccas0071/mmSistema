<?php

include_once '../classes/model/curso.php';

class CursoForm {

    private $acao;
    private $codigo;
    private $nome;
    private $cargaHoraria;
    private $emissor;

 
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

    public function getAcao()
    {
        return $this->acao;
    }

    public function setAcao($acao)
    {
        $this->acao = $acao;

        return $this;
    }

    public function validate($request){

    }
    
    public function transfereRequestForm($request){

        $this->setAcao($request['acao']);
        $this->setCodigo($request['codigoCurso']);
        $this->setNome($request['nome']);
        $this->setCargaHoraria($request['cargaHoraria']);
        $this->setEmissor($request['emissor']);

    }

    public function transfereFormModel(){

        $objCurso = new Curso();

        $objCurso->setAcao($this->getAcao());
        $objCurso->setCodigo($this->getCodigo());
        $objCurso->setNome($this->getNome());
        $objCurso->setCargaHoraria($this->getCargaHoraria());
        $objCurso->setEmissor($this->getEmissor());

        return $objCurso;
    }

    public function transfereModelForm($objCurso){

        $this->setAcao($objCurso->getAcao());
        $this->setCodigo($objCurso->getCodigo());
        $this->setNome($objCurso->getNome());
        $this->setCargaHoraria($objCurso->getCargaHoraria());
        $this->setEmissor($objCurso->getEmissor());

        return $this;
    }



    
}