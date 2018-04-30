<?php

//Definición de URIs básicas
$app->get('/', 'App\Controller\DefaultController:getHelp');
$app->get('/version', 'App\Controller\DefaultController:getVersion');
$app->get('/status', 'App\Controller\DefaultController:getStatus');

$app->group('/api/v1', function () use ($app) {
  //Definición de URIs para Partidas
  $app->group('/partidas', function () use ($app) {
    $app->get('', 'App\Controller\Partida\GetAllPartidas');
    $app->post('','App\Controller\Partida\CreatePartida');
    $app->put('/[{nombre}]','App\Controller\Partida\UpdatePartida');
  });
  //Definición de URIs para Jugadas
  $app->group('/jugadas', function () use ($app) {
    $app->get('', 'App\Controller\Jugada\GetAllJugadas');
	$app->get('/partida/[{nombrePartida}]', 'App\Controller\Jugada\GetJugadasPartida');
	$app->delete('/[{idJugada}/{nombrePartida}]', 'App\Controller\Jugada\DeleteJugada');
    $app->post('', 'App\Controller\Jugada\CreateJugada');
  });
});
