$("input[id*='cpf']").inputmask({
    mask: ['999.999.999-99', '99.999.999/9999-99'],
    keepStatic: true
});
$("input[id*='telefone']").inputmask({
    mask: ['(99) 9999-9999'],
    keepStatic: true
});
$("input[id*='celular']").inputmask({
    mask: ['(99) 9.9999-9999'],
    keepStatic: true
});
$("input[id*='cep']").inputmask({
    mask: ['99.999-999'],
    keepStatic: true
});
$("input[id*='data']").inputmask({
    mask: ['99/99/9999'],
    keepStatic: true
});
$("input[id*='cnpj']").inputmask({
    mask: ['99.999.999/9999-99'],
    keepStatic: true
});
$("input[id*='placa']").inputmask({
    mask: ['AAA-9999'],
    keepStatic: true
});



$("input[id*='money']").inputmask({
    'alias': 'numeric',
    'selectAllOnFocus':true,
    'groupSeparator': '.',
    'autoGroup': true,
    'digits': 2,
    'radixPoint': ",",
    'digitsOptional': false,
    'allowMinus': false,
    'reverse': true,
    'placeholder': ''
});

$("input[class*='money']").inputmask({
    'alias': 'numeric',
    'selectAllOnFocus':true,
    'groupSeparator': '.',
    'autoGroup': true,
    'digits': 2,
    'radixPoint': ",",
    'digitsOptional': false,
    'allowMinus': false,
    'reverse': true,
    'placeholder': ''
});