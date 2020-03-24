<?php

class ConnectionFactory {

    public static function getConnection() {
        $envPath = realpath(dirname(__FILE__) . '/config/env.ini');
        $env = parse_ini_file($envPath);

        try {
            $conexao = new PDO("mysql:host={$env['host']};dbname={$env['database']}", $env['username'], $env['password']);
            return $conexao;
        } catch(PDOException $e) {
            die('Erro: ' . $e->getMessage());
        }

    }

}
