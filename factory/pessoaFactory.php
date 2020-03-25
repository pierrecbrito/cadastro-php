<?php
require_once 'config/config.php';
require_once 'models/pessoa.php' ;
require_once 'enderecoFactory.php';
require_once 'DAO/pessoaDAO.php';

/**
 *  Classe responsável pela validação e construção de uma pessoa
 */

class PessoaFactory {
    /**
     * Retora uma pessoa ou um array com erros.
     */
    public static function buildPessoa() {
        $erros = [];
        $data = null;

        if(!filter_input(INPUT_POST, 'nome')) {
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

        $daoPessoa = new PessoaDAO();  
        if(!filter_input(INPUT_POST, 'cpf') || !static::validaCPF($_POST['cpf'])) {
            $erros['cpf'] = 'O CPF não é válido!';
        } elseif($daoPessoa->encontrarCPF($_POST['cpf'])) {
            $erros['cpf'] = 'O CPF já está cadastrado!';
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

        $endereco = EnderecoFactory::buildEndereco();

        if(is_array($endereco)) {//Erro
            foreach($endereco as $key => $value)
                $erros[$key] = $value;
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
            $pessoa = new Pessoa($nome, $email, $nascimento, $cpf, $whatsapp, $salario, $endereco);
            return $pessoa;
        }
    }

    private static function validaCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    
    }

}