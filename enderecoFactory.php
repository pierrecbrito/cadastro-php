
<?php

class EnderecoFactory {
/**
     * Retora uma pessoa ou um array com erros.
     */
    public static function buildEndereco() {
        $erros = [];
        $data = null;

        if(!filter_input(INPUT_POST, 'cep')) {
            $erros['nome'] = 'O nome é obrigatório!';
        }

        if(filter_input(INPUT_POST, 'nascimento') ) {
            $data = DateTime::createFromFormat('d/m/Y', $_POST['nascimento']);
        } else {
            $erros['nascimento'] = 'Atenção a data! O formato deve ser d/m/a.';
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $erros['email'] = 'E-mail inválido!';
        }    

        if(!filter_input(INPUT_POST, 'cpf') || !static::validaCPF($_POST['cpf'])) {
            $erros['cpf'] = 'O CPF não é válido!';
        }

        if(!filter_input(INPUT_POST, 'whatsapp')) {
            $erros['whatsapp'] = 'O Whatsapp não foi informado!';
        }

        $salarioConfig = ['options' => ['decimal' => ',']];
        if(!isset($_POST['salario'])){
            $erros['salario'] = 'Valor do salário não foi passado!';
        } elseif(!filter_var($_POST['salario'], FILTER_VALIDATE_FLOAT, $salarioConfig)) {
            $erros['salario'] = 'Valor do salário inválido!';
        }

        if(count($erros) > 0) {
            return $erros;
        }  else {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $nascimento = $data;
            $cpf = $_POST['cpf'];
            $whatsapp = $_POST['whatsapp'];
            $salario = $_POST['salario'];
            $pessoa = new Pessoa($nome, $email, $nascimento, $cpf, $whatsapp, $salario);
            return $pessoa;
        }
    }