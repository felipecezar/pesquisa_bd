<?php

    class BD {
        private $con;
        private $host = "localhost";
        private $banco = "aula_fetch";
        private $usuario = "root";
        private $senha = "";


        public function __construct() {
            $pdo = "mysql:host=" . $this ->host . ";dbname=" . $this->banco . ';charset=utf8';

            try {
                $this->con = new PDO($pdo, $this->usuario);
                $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                #echo "Conectado com sucesso ao DB.";
            } catch(PDOException $e){
                echo "Falha ao conectar no BD: " . $e->getMessage(); 
            }
        }

        public function todosDados(){
            $sql = "SELECT nome FROM nomes";
            $pdo = $this->con->prepare($sql);
            $pdo->execute();
            $dados = $pdo->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        }

        public function pesquisarDados($nome){
            $sql = 'SELECT nome FROM nomes WHERE nome LIKE "%' . $nome . '%"';
            $pdo = $this->con->prepare($sql);
            $pdo->execute();
            $dados = $pdo->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        }
    }

 ?>   