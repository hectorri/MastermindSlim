<?php

use \App\Resource\Partida\PartidaResource;

$container = $app->getContainer();

/**
 * @return ApiError

$container["errorHandler"] = function() {
    return new ApiError;
};*/

$container['partida_resource'] = function($container) {
  return new PartidaResource($container);
};
