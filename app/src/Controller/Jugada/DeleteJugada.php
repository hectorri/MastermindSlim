<?php

namespace App\Controller\Jugada;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Delete Jugada Controller.
 */
class DeleteJugada extends BaseJugada {

	protected $jugadaResource;

	public function __construct(Container $container)
	{
	  $this->logger = $container->get('logger');
	  $this->jugadaResource = $container->get('jugada_resource');
	}
  
	protected function getJugadaResource()
	{
	  return $this->jugadaResource;
	}

    public function __invoke($request, $response, $args){

	    $this->setParams($request, $response, $args);
      //$input = $this->getInput();
      $idJugada = $this->args['idJugada'];
      $nombrePartida = $this->args['nombrePartida'];
      $result = $this->getJugadaResource()->deleteJugada($idJugada, $nombrePartida);
      if ($result == null) {
        return $this->jsonResponse('error', $result, 404);
      }
      return $this->jsonResponse('success', $result, 200);
    }
}