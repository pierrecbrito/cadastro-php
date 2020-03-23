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

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800&display=swap" rel="stylesheet">
    <link href="./assets/fontawesome/css/all.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <h1 class="container__titulo">Cadastro Simples com PHP</h1>
        <h2 class="container__subtitulo">O objetivo é somente salvar os dados em uma tabela simples em um banco de dados.</h2>
   
        <form action="" class="formulario">
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
            <div class="formulario__wrapper">
                <label for="campo__cpf" class="formulario__etiqueta">CPF:</label>
                <input id="campo__cpf" type="email" class="formulario__campo">
                <div class="formulario__mensagem"><i class="fas fa-exclamation-triangle"></i> Campo está vazio!</div>
            </div>
        </form>
    </main>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#campo__cpf').mask('000.000.000-00', {reverse: true});
        });
    </script>
</body>
</html>