<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vaga;
use \App\Db\Pagination;
use \App\Session\Login;

//OBRIGA USUARIO A ESTA LOGADO
Login::requireLogin();

//BUSCA 
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);


//FILTRO DE STATUS
$filtroStatus = filter_input(INPUT_GET, 'filtroStatus', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus,['s','n']) ? $filtroStatus : '';

//CONDICOES SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'.str_replace(' ','%',$busca).'%"' : null,
    strlen($filtroStatus) ? 'ativo = "'.$filtroStatus.'"' : null
];

//remove posicoes vazias
$condicoes = array_filter($condicoes);

//Clausula where
$where = implode(' AND ',$condicoes);

//Quantidade total de vagas
$quantidadeVagas = Vaga::getQuantidadeVagas($where);

//PAginacao
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 5);

//OBTEM AS VAGAS
$vagas = Vaga::getVagas($where, null, $obPagination->getLimit());


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
 
