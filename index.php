<?php
require_once 'config/config.php';
require_once 'pessoaDAO.php';

$erros = [];
$pessoa = null;
$sucesso = false;

    if(count($_POST) > 0) {
        require_once 'pessoaFactory.php';
        $processo = PessoaFactory::buildPessoa();

        if(is_array($processo)) 
            $erros = $processo;
        else {
            $pessoa = $processo;
            $dao = new PessoaDAO();

            $sucesso = $dao->insert($pessoa);
            if(is_array($sucesso)) {
                print_r($sucesso);
                $erros['erro_banco'] = "Erro na inserção do banco! ({$sucesso[2]})";
                $sucesso = false;
            }
                
        }       

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro PHP</title>

    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/container.css">
    <link rel="stylesheet" href="./assets/css/container/container-titulo.css">
    <link rel="stylesheet" href="./assets/css/container/container-subtitulo.css">
    <link rel="stylesheet" href="./assets/css/container/container-mensagem-sucesso.css">
    <link rel="stylesheet" href="./assets/css/formulario.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-wrapper.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-etiqueta.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-campo.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-mensagem.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-botao.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-row.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-icone.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
    <link href="./assets/fontawesome/css/all.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <h1 class="container__titulo">Cadastro Simples com PHP</h1>
        <h2 class="container__subtitulo">Todos os campos são obrigatórios! Só precisa do CEP no endereço.</h2>

        <?php if($sucesso): ?>
            <div class="container__mensagem__sucesso">
                Os dados de <span class="container__mensagem__nome"><?= $pessoa->nome ?> </span> foram salvos com sucesso!
                <?php $_POST = []; ?>
            </div>
        <?php endif ?>

        <?php if(isset($erros['erro_banco'])): ?>
            <div class="container__mensagem__erro">
                <?= $erros['erro_banco'];?>
            </div>
        <?php endif ?>

        <form action="#" method="POST" class="formulario">
            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__nome" class="formulario__etiqueta">Nome:</label>
                    <input id="campo__nome" type="text" class="formulario__campo" name="nome" value="<?= $_POST['nome'] ?? '' ?>">
                    
                    <?php if(isset($erros['nome'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['nome']?></div>
                    <?php endif ?>
                </div>
                <div class="formulario__wrapper">
                    <label for="campo__email" class="formulario__etiqueta">Email:</label>
                    <input id="campo__email" type="email" class="formulario__campo" name="email" value="<?= $_POST['email'] ?? '' ?>">
                    <?php if(isset($erros['email'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['email']?></div>
                    <?php endif ?>
                </div>
            </div>

            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__nascimento" class="formulario__etiqueta">Data de Nascimento:</label>
                    <input id="campo__nascimento" type="text" class="formulario__campo" name="nascimento" value="<?= $_POST['nascimento'] ?? '' ?>">
                
                    <?php if(isset($erros['nascimento'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['nascimento']?></div>
                    <?php endif ?>
                </div>
            
                <div class="formulario__wrapper">
                    <label for="campo__cpf" class="formulario__etiqueta">CPF:</label>
                    <input id="campo__cpf" type="text" class="formulario__campo" name="cpf" value="<?= $_POST['cpf'] ?? '' ?>">
                    <?php if(isset($erros['cpf'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['cpf']?></div>
                    <?php endif ?>
                </div>
            </div>
        
            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__whatsapp" class="formulario__etiqueta">Whatsapp:</label>
                    <input id="campo__whatsapp" type="text" class="formulario__campo" name="whatsapp" value="<?= $_POST['whatsapp'] ?? '' ?>">

                    <?php if(isset($erros['whatsapp'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['whatsapp']?></div>
                    <?php endif ?>
                </div>
                <div class="formulario__wrapper">
                    <label for="campo__salario" class="formulario__etiqueta">Salário:</label>
                    <input id="campo__salario" type="text" class="formulario__campo" name="salario" value="<?= $_POST['salario'] ?? '' ?>">

                    <?php if(isset($erros['salario'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['salario']?></div>
                    <?php endif ?>
                </div>
            </div>
            
            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__cep" class="formulario__etiqueta">CEP:</label>
                    <input id="campo__cep" type="text" class="formulario__campo" name="cep">
                    <a id="link__cep">Pesquisar endereço</a>
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
                <div class="formulario__wrapper">
                    <label for="campo__estado" class="formulario__etiqueta">Estado:</label>
                    <input id="campo__estado" type="text" class="formulario__campo" disabled name="estado">
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
            </div>

            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__cidade" class="formulario__etiqueta">Cidade:</label>
                    <input id="campo__cidade" type="text" class="formulario__campo" disabled name="cidade">
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
                <div class="formulario__wrapper">
                    <label for="campo__bairro" class="formulario__etiqueta">Bairro:</label>
                    <input id="campo__bairro" type="text" class="formulario__campo" disabled name="bairro">
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
            </div>
            
            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__rua" class="formulario__etiqueta">Rua:</label>
                    <input id="campo__rua" type="text" class="formulario__campo" disabled name="rua">
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
                <div class="formulario__wrapper">
                    <label for="campo__numero" class="formulario__etiqueta">Número:</label>
                    <input id="campo__numero" type="number" class="formulario__campo" name="numero">
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
            </div>
            
            <button class="formulario__botao">Salvar</button>
        </form>
    </main>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#campo__cpf').mask('000.000.000-00', {reverse: true});
            $('#campo__whatsapp').mask('(00) 00000-0000');
            $('#campo__salario').mask('000000000,00', {reverse: true});
            $('#campo__nascimento').mask('00/00/0000');
            $('#campo__cep').mask('00000-000');
        });
    </script>
    <script src="./assets/js/jquery-viacep.js"></script>
    <script>

        $('#campo__cep').autocompleteAddress({
            city: '#campo__cidade',
            address: '#campo__rua',
            neighborhood: '#campo__bairro',
            state: '#campo__estado',
            publicAPI: 'https://viacep.com.br/ws/{{cep}}/json/',
        });

        $('#link__cep').on('click', e  => {
            window.open('http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm', 'janela', 'width=840, height=600, top=100, left=699');
        })
      
    </script>
</body>
</html>