<?php

class Connection{

    public $pdo;    

    public function __construct(){
    
        $endereco = 'localhost';
        $banco = 'mm_tecnologia';
        $usuario = 'postgres';
        $senha = 'acesse';

        try {

            $this->pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha);
        
            //echo "Conectado no banco de dados";
        } catch (PDOException $e) {
            echo "Falha ao Conectar ao Banco de Dados. <br/>";
            die($e->getMessage());
        }
    }

    public function closePDO(){
        $this->pdo = null;
    }
}

