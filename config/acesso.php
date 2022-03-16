<?php
$statusCovid19verde = explode(';', env('STATUS_COVID19_VERDE', 'Dose de reforço'));
$statusCovid19amarelo = explode(';', env('STATUS_COVID19_AMARELO', 'Não cadastrado'));
$statusCovid19vermelho = explode(';', env('STATUS_COVID19_VERMELHO', ''));
return [
    'statusCovid19verde' => $statusCovid19verde,
    'statusCovid19amarelo' => $statusCovid19amarelo,
    'statusCovid19vermelho' => $statusCovid19vermelho
];