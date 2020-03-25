<?php


class Endereco {
    public $cep;
    public $estado;
    public $cidade;
    public $bairro;
    public $rua;
    public $numero;
    public $endereco;

    public function __construct($cep, $estado, $cidade, $bairro, $rua, $numero, $pessoa) {
        $this->cep = $cep;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->pessoa = $pessoa;
    }

    public function __toString() {
        $out = "Endereco {cep = {$this->cep}, estado = {$this->estado}";
        $out .= ", cidade = {$this->cidade}, bairro = {$this->bairro}";
        $out .= ", rua = {$this->rua}, numero = {$this->numero}, id = {$this->id}";
        $out .= ", pessoa = {$this->pessoa}}";
        return $out; 
    }
}