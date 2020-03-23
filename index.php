<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro PHP</title>

    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/container.css">
    <link rel="stylesheet" href="./assets/css/container-subtitulo.css">
    <link rel="stylesheet" href="./assets/css/formulario.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-wrapper.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-etiqueta.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-campo.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-mensagem.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-botao.css">
    <link rel="stylesheet" href="./assets/css/formulario/formulario-row.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
    <link href="./assets/fontawesome/css/all.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <h1 class="container__titulo">Cadastro Simples com PHP</h1>
        <h2 class="container__subtitulo">Todos os campos são obrigatórios!</h2>
   
        <form action="" class="formulario">
            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__nome" class="formulario__etiqueta">Nome:</label>
                    <input id="campo__nome" type="text" class="formulario__campo">
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
                <div class="formulario__wrapper">
                    <label for="campo__email" class="formulario__etiqueta">Email:</label>
                    <input id="campo__email" type="email" class="formulario__campo">
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
            </div>

            <div class="formulario__wrapper">
                <label for="campo__nascimento" class="formulario__etiqueta">Data de Nascimento:</label>
                <input id="campo__nascimento" type="text" class="formulario__campo">
                <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
            </div>
           
            <div class="formulario__wrapper">
                <label for="campo__cpf" class="formulario__etiqueta">CPF:</label>
                <input id="campo__cpf" type="email" class="formulario__campo">
                <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
            </div>

            <div class="formulario__row">
                <div class="formulario__wrapper">
                    <label for="campo__whatsapp" class="formulario__etiqueta">Whatsapp:</label>
                    <input id="campo__whatsapp" type="text" class="formulario__campo">
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
                <div class="formulario__wrapper">
                    <label for="campo__salario" class="formulario__etiqueta">Salário:</label>
                    <input id="campo__salario" type="text" class="formulario__campo">
                    <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
                </div>
            </div>
            
          
            <div class="formulario__wrapper">
                <label for="campo__cep" class="formulario__etiqueta">CEP:</label>
                <input id="campo__cep" type="text" class="formulario__campo">
                <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
            </div>
            <div class="formulario__wrapper">
                <label for="campo__estado" class="formulario__etiqueta">Estado:</label>
                <select name="" id="campo__estado" class="formulario__campo">
                    <option value="1">RN</option>
                    <option value="2">Brasília</option>
                </select>
                <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
            </div>
            <div class="formulario__wrapper">
                <label for="campo__cidade" class="formulario__etiqueta">Cidade:</label>
                <select name="" id="campo__cidade" class="formulario__campo">
                    <option value="1">RN</option>
                    <option value="2">Brasília</option>
                </select>
                <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
            </div>
            <div class="formulario__wrapper">
                <label for="campo__bairro" class="formulario__etiqueta">Bairro:</label>
                <select name="" id="campo__bairro" class="formulario__campo" disable='true'>
                    <option value="1">RN</option>
                    <option value="2">Brasília</option>
                </select>
                <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
            </div>
            <div class="formulario__wrapper">
                <label for="campo__rua" class="formulario__etiqueta">Rua:</label>
                <input id="campo__rua" type="text" class="formulario__campo">
                <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
            </div>
            <div class="formulario__wrapper">
                <label for="campo__numero" class="formulario__etiqueta">Número:</label>
                <input id="campo__numero" type="number" class="formulario__campo">
                <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
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
            $('#campo__salario').mask('000.000.000.000.000,00', {reverse: true});
            $('#campo__nascimento').mask('00/00/0000');
            $('#campo__cep').mask('00000-000');
        });
    </script>
</body>
</html>