@php

$paises = [
'',
'Afeganistão',
'África do Sul',
'Akrotiri',
'Albânia',
'Alemanha',
'Andorra',
'Angola',
'Anguila',
'Antártida',
'Antígua e Barbuda',
'Arábia Saudita',
'Arctic Ocean',
'Argélia',
'Argentina',
'Arménia',
'Aruba',
'Ashmore and Cartier Islands',
'Atlantic Ocean',
'Austrália',
'Áustria',
'Azerbaijão',
'Baamas',
'Bangladesh',
'Barbados',
'Barém',
'Bélgica',
'Belize',
'Benim',
'Bermudas',
'Bielorrússia',
'Birmânia',
'Bolívia',
'Bósnia e Herzegovina',
'Botsuana',
'Brasil',
'Brunei',
'Bulgária',
'Burquina Faso',
'Burúndi',
'Butão',
'Cabo Verde',
'Camarões',
'Camboja',
'Canadá',
'Catar',
'Cazaquistão',
'Chade',
'Chile',
'China',
'Chipre',
'Clipperton Island',
'Colômbia',
'Comores',
'Congo-Brazzaville',
'Congo-Kinshasa',
'Coral Sea Islands',
'Coreia do Norte',
'Coreia do Sul',
'Costa do Marfim',
'Costa Rica',
'Croácia',
'Cuba',
'Curacao',
'Dhekelia',
'Dinamarca',
'Domínica',
'Egito',
'Emirados Árabes Unidos',
'Equador',
'Eritreia',
'Eslováquia',
'Eslovénia',
'Espanha',
'Estados Unidos',
'Estónia',
'Etiópia',
'Faroé',
'Fiji',
'Filipinas',
'Finlândia',
'França',
'Gabão',
'Gâmbia',
'Gana',
'Gaza',
'Geórgia',
'Geórgia do Sul e Sandwich do Sul',
'Gibraltar',
'Granada',
'Grécia',
'Groenlândia',
'Guame',
'Guatemala',
'Guernsey',
'Guiana',
'Guiné',
'Guiné Equatorial',
'Guiné-Bissau',
'Haiti',
'Honduras',
'Hong Kong',
'Hungria',
'Iémen',
'Ilha Bouvet',
'Ilha do Natal',
'Ilha Norfolk',
'Ilhas Caimão',
'Ilhas Cook',
'Ilhas dos Cocos',
'Ilhas Falkland',
'Ilhas Heard e McDonald',
'Ilhas Marshall',
'Ilhas Salomão',
'Ilhas Turcas e Caicos',
'Ilhas Virgens Americanas',
'Ilhas Virgens Britânicas',
'Índia',
'Indonésia',
'Irã',
'Iraque',
'Irlanda',
'Islândia',
'Israel',
'Itália',
'Jamaica',
'Jan Mayen',
'Japão',
'Jersey',
'Jibuti',
'Jordânia',
'Kosovo',
'Kuwait',
'Laos',
'Lesoto',
'Letónia',
'Líbano',
'Libéria',
'Líbia',
'Listenstaine',
'Lituânia',
'Luxemburgo',
'Macau',
'Macedônia',
'Madagascar',
'Malásia',
'Malávi',
'Maldivas',
'Mali',
'Malta',
'Man, Isle of',
'Marianas do Norte',
'Marrocos',
'Maurícia',
'Mauritânia',
'México',
'Micronésia',
'Moçambique',
'Moldávia',
'Mónaco',
'Mongólia',
'Monserrate',
'Montenegro',
'Namíbia',
'Nauru',
'Navassa Island',
'Nepal',
'Nicarágua',
'Níger',
'Nigéria',
'Niue',
'Noruega',
'Nova Caledónia',
'Nova Zelândia',
'Omã',
'Pacific Ocean',
'Países Baixos',
'Palau',
'Panamá',
'Papua-Nova Guiné',
'Paquistão',
'Paracel Islands',
'Paraguai',
'Peru',
'Pitcairn',
'Polinésia Francesa',
'Polónia',
'Porto Rico',
'Portugal',
'Quénia',
'Quirguizistão',
'Quiribáti',
'Reino Unido',
'República Centro-Africana',
'República Dominicana',
'Roménia',
'Ruanda',
'Rússia',
'Salvador',
'Samoa',
'Samoa Americana',
'Santa Helena',
'Santa Lúcia',
'São Bartolomeu',
'São Cristóvão e Neves',
'São Marinho',
'São Martinho',
'São Pedro e Miquelon',
'São Tomé e Príncipe',
'São Vicente e Granadinas',
'Sara Ocidental',
'Seicheles',
'Senegal',
'Serra Leoa',
'Sérvia',
'Singapura',
'Saint Maarten',
'Síria',
'Somália',
'Southern Ocean',
'Spratly Islands',
'Sri Lanca',
'Suazilândia',
'Sudão',
'Sudão do Sul',
'Suécia',
'Suíça',
'Suriname',
'Svalbard e Jan Mayen',
'Tailândia',
'Taiwan',
'Tajiquistão',
'Tanzânia',
'Território Britânico do Oceano Índico',
'Territórios Austrais Franceses',
'Timor Leste',
'Togo',
'Tokelau',
'Tonga',
'Trinidad e Tobago',
'Tunísia',
'Turquemenistão',
'Turquia',
'Tuvalu',
'Ucrânia',
'Uganda',
'Uruguai',
'Usbequistão',
'Vanuatu',
'Vaticano',
'Venezuela',
'Vietname',
'Wake Island',
'Wallis e Futuna',
'West Bank',
'Zâmbia',
'Zimbabue',
];
        @endphp
@if (isset($lote))
@foreach ($paises as $pais)
    <option value="{{ $pais }}" {{$lote->origem == $pais ? 'selected' : '' }}>{{ $pais }}</option>
@endforeach
@else
@foreach ($paises as $pais)
    <option value="{{ $pais }}">{{ $pais }}</option>
@endforeach
@endif