<?php


class Endereco {
    public $id;
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

    public function __toString() {
        $out = "Endereco {cep = {$this->cep}, estado = {$this->estado}}";
        $out .= ", cidade = {$this->cidade}, bairro = {$this->bairro}";
        $out .= ", rua = {$this->rua}, numero = {$this->numero}, id = {$this->id}";
        return $out; 
    }
}