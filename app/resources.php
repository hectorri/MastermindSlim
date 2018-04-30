<?php

use \App\Resource\Partida\PartidaResource;
use \App\Resource\Jugada\JugadaResource;

$container = $app->getContainer();

/**
 * Acceso a gestor de Partidas
 */
$container['partida_resource'] = function($container) {
  return new PartidaResource($container);
};

/**
 * Acceso a gestor de Jugadas
 */
$container['jugada_resource'] = function($container) {
  return new JugadaResource($container);
};
