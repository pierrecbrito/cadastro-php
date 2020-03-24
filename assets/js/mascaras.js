$(document).ready(function(){
    $('#campo__cpf').mask('000.000.000-00', {reverse: true});
    $('#campo__whatsapp').mask('(00) 00000-0000');
    $('#campo__salario').mask('000000000,00', {reverse: true});
    $('#campo__nascimento').mask('00/00/0000');
    $('#campo__cep').mask('00000-000');
});