<?php
require_once  'config/config.php';
require_once 'DAO/pessoaDAO.php';
require_once 'DAO/enderecoDAO.php';

$erros = [];
$pessoa = null;
$sucesso = false;

    if(count($_POST) > 0) {
        require_once 'pessoaFactory.php';
        $processo = PessoaFactory::buildPessoa();

        if(is_array($processo)) {
            $erros = $processo;
        } else {
            $pessoa = $processo;      
            $daoPessoa = new PessoaDAO();
            $daoEndereco = new EnderecoDAO();
            
            $insertEndereco = $daoEndereco->insert($pessoa->endereco);
            $insertPessoa = $daoPessoa->insert($pessoa);

            echo $pessoa->endereco;

            if(is_array($insertPessoa)) {
                $erros['erro_banco'] = "Erro na inserção do banco! ({$insertPessoa[2]})";
                $sucesso = false;
            } 
            
            if(is_array($insertEndereco)) {
                $erros['erro_banco_endereco'] = "Erro na inserção do banco! ({$insertEndereco[2]})";
                $sucesso = false;
            } 
            
            if(!is_array($insertEndereco) && !is_array($insertPessoa)){
                $sucesso =  true;
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
    <link rel="stylesheet" href="./assets/css/formulario/link-cep.css">

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

        <?php if(isset($erros['erro_banco']) || isset($erros['erro_banco_endereco'])): ?>
            <div class="container__mensagem__erro">
                <?= $erros['erro_banco'] ?? '';?>
                <?= $erros['erro_banco_endereco'] ?? '';?>
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
                    <input id="campo__cep" type="text" class="formulario__campo" name="cep" value="<?= $_POST['cep'] ?? '' ?>">
                    <a id="link__cep">Pesquisar endereço</a>
                    <?php if(isset($erros['cep'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['cep']?></div>
                    <?php endif ?>
                </div>
                <div class="formulario__wrapper">
                    <label for="campo__estado" class="formulario__etiqueta">Estado:</label>
                    <input id="campo__estado" type="text" class="formulario__campo" readonly name="estado" value="<?= $_POST['estado'] ?? '' ?>">
                    <?php if(isset($erros['estado'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['estado']?></div>
                    <?php endif ?>
                    
                </div>
            </div>

            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__cidade" class="formulario__etiqueta">Cidade:</label>
                    <input id="campo__cidade" type="text" class="formulario__campo" readonly name="cidade" value="<?= $_POST['cidade'] ?? '' ?>">
                    <?php if(isset($erros['cidade'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['cidade']?></div>
                    <?php endif ?>

                </div>
                <div class="formulario__wrapper">
                    <label for="campo__bairro" class="formulario__etiqueta">Bairro:</label>
                    <input id="campo__bairro" type="text" class="formulario__campo" readonly name="bairro" value="<?= $_POST['bairro'] ?? '' ?>">
                    <?php if(isset($erros['bairro'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['bairro']?></div>
                    <?php endif ?>
                   
                </div>
            </div>
            
            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__rua" class="formulario__etiqueta">Rua:</label>
                    <input id="campo__rua" type="text" class="formulario__campo" readonly name="rua" value="<?= $_POST['rua'] ?? '' ?>">
                    <?php if(isset($erros['rua'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['rua']?></div>
                    <?php endif ?>
                </div>
                <div class="formulario__wrapper">
                    <label for="campo__numero" class="formulario__etiqueta">Número:</label>
                    <input id="campo__numero" type="number" class="formulario__campo" name="numero" value="<?= $_POST['numero'] ?? '' ?>">
                    <?php if(isset($erros['numero'])): ?>
                        <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle formulario__icone"></i><?= $erros['numero']?></div>
                    <?php endif ?>
                </div>
            </div>
            
            <button class="formulario__botao">Salvar</button>
        </form>
    </main>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/jquery.mask.min.js"></script>
    <script src="./assets/js/mascaras.js"></script>
    <script src="./assets/js/jquery-viacep.js"></script>
    <script src="./assets/js/autocomplete.js"></script>
    <script src="./assets/js/link-cep.js"></script>
</body>
</html>