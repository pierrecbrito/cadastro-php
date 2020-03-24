<?php


class Endereco {
    public $cep;
    public $estado;
    public $cidade;
    public $bairro;
    public $rua;
    public $numero;

    public function __construct($cep, $estado, $cidade, $bairro, $rua, $numero) {
        $this->cep = $cep;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }

    
}