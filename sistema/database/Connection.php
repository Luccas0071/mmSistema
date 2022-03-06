<?php

class Connection{

    public $pdo;    

    public function Connection(){

        $endereco = 'localhost';
        $banco = 'mm_sistema';
        $usuario = 'postgres';
        $senha = 'acesse';

        try {
            $this->pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            //echo "Conectado no banco de dados";
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function closePDO(){
        $this->pdo = null;
    }
}

