<?php

use \App\Resource\Partida\PartidaResource;
use \App\Resource\Jugada\JugadaResource;

$container = $app->getContainer();

/**
 * @return ApiError

$container["errorHandler"] = function() {
    return new ApiError;
};*/

$container['partida_resource'] = function($container) {
  return new PartidaResource($container);
};

$container['jugada_resource'] = function($container) {
  return new JugadaResource($container);
};
