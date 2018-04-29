<?php

namespace App\Controller\Partida;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Create Partida Controller.
 */
class CreatePartida extends BasePartida
{
  
  /**
  * Create Partida.
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
    $result = $this->getPartidaResource()->createPartida($input);

    return $this->jsonResponse('success', $result, 201);   
  }
}
