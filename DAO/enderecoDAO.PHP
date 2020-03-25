<?php
require_once 'config/conexao.php';

class EnderecoDAO {
    private $conn;
    private static $SQL_INSERT = "INSERT INTO endereco (cep, estado, cidade, bairro, rua, numero) 
                                VALUES (:cep, :estado, :cidade, :bairro, :rua, :numero)";

    public function __construct() {
        $this->conn = ConnectionFactory::getConnection();
    }

    public function insert($endereco) {
        $stmt = $this->conn->prepare(static::$SQL_INSERT);
        $stmt->bindValue(':cep', $endereco->cep, PDO::PARAM_STR);
        $stmt->bindValue(':estado', $endereco->estado, PDO::PARAM_STR);
        $stmt->bindValue(':cidade', $endereco->cidade, PDO::PARAM_STR);
        $stmt->bindValue(':bairro', $endereco->bairro, PDO::PARAM_STR);
        $stmt->bindValue(':rua', $endereco->rua, PDO::PARAM_STR);
        $stmt->bindValue(':numero', $endereco->numero, PDO::PARAM_INT);

        if($stmt->execute()) {
            $id = $this->conn->lastInsertId();
            $endereco->id = $id;
            return true;
        } else {
            return $stmt->errorInfo();
        }
    }
}