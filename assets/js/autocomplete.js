$('#campo__cep').autocompleteAddress({
    city: '#campo__cidade',
    address: '#campo__rua',
    neighborhood: '#campo__bairro',
    state: '#campo__estado',
    publicAPI: 'https://viacep.com.br/ws/{{cep}}/json/',
});