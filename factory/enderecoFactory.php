
<?php
require_once 'models/endereco.php';
require_once 'pessoaFactory.php';

class EnderecoFactory {
/**
     * Retora uma pessoa ou um array com erros.
     */
    public static function buildEndereco() {
        $erros = [];

        if(!filter_input(INPUT_POST, 'cep') || strlen($_POST['cep']) != 9) {
            $erros['cep'] = 'O CEP está inválido!';
        }

        if(!filter_input(INPUT_POST, 'estado')) {
            $erros['estado'] = 'O Estado está inválido!';
        }

        if(!filter_input(INPUT_POST, 'cidade')) {
            $erros['cidade'] = 'A cidade está inválida!';
        }

        if(!filter_input(INPUT_POST, 'bairro')) {
            $erros['bairro'] = 'O bairro está inválido!';
        }

        if(!filter_input(INPUT_POST, 'rua')) {
            $erros['rua'] = 'A rua está inválida!';
        }

        $numeroConfig = ["options" => ["min_range" => 0]];
        if(!filter_var($_POST['numero'], FILTER_VALIDATE_INT, $numeroConfig) || empty($_POST['numero'])) {
            $erros['numero'] = 'Número da casa inválido!';
        }

        $pessoa = PessoaFactory::buildPessoa();
        if(is_array($pessoa)) {//Erro
            foreach($pessoa as $key => $value)
                $erros[$key] = $value;
        }

        if(count($erros) > 0) {
            return $erros;
        }  else {
            $cep = $_POST['cep'];
            $estado = $_POST['estado'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $endereco = new Endereco($cep, $estado, $cidade, $bairro, $rua, $numero, $pessoa);
            return $endereco;
        }
    }

}