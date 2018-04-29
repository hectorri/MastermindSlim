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
    $estado = $this->args['estado']; 
    $this->logger->info("nombreLeido = " . $nombreLeido); 
    $result = $this->getPartidaResource()->updatePartida($nombreLeido, $estado);

    return $this->jsonResponse('success', $result, 200);

    //$result = $this->getUserService()->updateUser($input, $this->args['id']);
  
  }
}
