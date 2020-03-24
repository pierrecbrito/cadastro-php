<?php
require_once 'config/config.php';
require_once 'conexao.php';
require_once 'pessoa.php';

class PessoaDAO {
    private $conn;
    private static $SQL_INSERT = "INSERT INTO pessoa (nome, email, cpf, data_nascimento, whatsapp, salario) 
                                VALUES (:nome, :email, :cpf, :data, :whatsapp, :salario)";

    public function __construct() {
        $this->conn = ConnectionFactory::getConnection();
    }

    public function insert($pessoa) {
        $stmt = $this->conn->prepare(static::$SQL_INSERT);
        $stmt->bindValue(':nome', $pessoa->nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $pessoa->email, PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $pessoa->cpf, PDO::PARAM_STR);
        $stmt->bindValue(':data', $pessoa->nascimento, PDO::PARAM_STR);
        $stmt->bindValue(':whatsapp', $pessoa->whatsapp, PDO::PARAM_STR);
        $stmt->bindValue(':salario', $pessoa->salario, PDO::PARAM_STR);

        if($stmt->execute()) {
            return true;
        } else {
            return $stmt->errorInfo();
        }
    }
}
