<?php

namespace App\Controller\Partida;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Create Partida Controller.
 */
class UpdatePartida extends BasePartida
{
  
  /**
  * Update Partida.
  *
  * @param Request $request
  * @param Response $response
  * @param array $args
  * @return Response
  */
  public function __invoke($request, $response, $args)
  {
    $this->setParams($request, $response, $args);
    $input = $this->getInput();
    $nombreLeido = $this->args['nombre'];
    $result = $this->getPartidaResource()->updatePartida($input, $nombreLeido);

    if ($result == null) {
      return $this->jsonResponse('error', $result, 404);
    }
    return $this->jsonResponse('success', $result, 200);
  }
}
