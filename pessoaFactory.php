<?php

require_once('pessoa.php');

/**
 *  Classe responsável pela validação e construção de uma pessoa
 */

class PessoaFactory {
    /**
     * Retora uma pessoa ou um array com erros.
     */
    public static function buildPessoa() {
        $erros = [];

        if(!filter_input(INPUT_POST, 'nome')) {
            $erros['nome'] = 'O nome é obrigatório!';
        }

        if(!filter_input(INPUT_POST, 'nascimento') ) {
            $data = DateTime::createFromFormat('d/m/Y', $_POST['nascimento']);
    
            if(!$data) {
                $erros[] = 'Atenção a data! O formato deve ser d/m/a.';
            }
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $erros['email'] = 'E-mail inválido!';
        }    

        if(!filter_input(INPUT_POST, 'cpf')) {
            $erros['cpf'] = 'O CPF não foi informado!';
        }

        if(!filter_input(INPUT_POST, 'whatsapp')) {
            $erros['whatsapp'] = 'O CPF não foi informado!';
        }

        $salarioConfig = ['options' => ['decimal' => ',']];
        if(!isset($_POST['salario'])){
            $erros['salario'] = 'Valor do salário não foi passado!';
        } elseif(!filter_var($_POST['salario'], FILTER_VALIDATE_FLOAT, $salarioConfig)) {
            $erros['salario'] = 'Valor do salário inválido!';
        }

        if(count($erros) > 0) {
            echo "OPAA";
            return $erros;
        }  else {
            echo "opaa2";
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $nascimento = $_POST['nascimento'];
            $cpf = $_POST['cpf'];
            $whatsapp = $_POST['whatsapp'];
            $salario = $_POST['salario'];
            $pessoa = new Pessoa($nome, $email, $nascimento, $cpf, $whatsapp, $salario);
            return $pessoa;
        }
    }

}