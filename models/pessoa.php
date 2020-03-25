<?php

class Pessoa {
    public $id;
    public $nome;
    public $email;
    public $nascimento;
    public $cpf;
    public $whatsapp;
    public $salario;

    public function __construct($nome, $email, $nascimento, $cpf, $whatsapp, $salario) {
        $this->nome = $nome;
        $this->email = $email;
        $this->nascimento = $nascimento->format('Y-m-d');
        $this->cpf = $cpf;
        $this->whatsapp = $whatsapp;
        $this->salario = str_replace(',', '.', $salario);
    }

    public function __toString() {
        $out = "Pessoa {nome = {$this->nome}, email = {$this->email}}";
        $out .= ", nascimento = {$this->nascimento}, cpf = {$this->cpf}";
        $out .= ", whatsapp = {$this->whatsapp}, salario = {$this->salario}, ";
        return $out; 
    }
}