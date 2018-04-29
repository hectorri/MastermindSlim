<?php

namespace App\Controller\Jugada;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Delete Jugada Controller.
 */
class DeleteJugada extends BaseController {

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
        $nombre = $this->args['nombre'];
        $result = $this->getJugadaResource()->deleteJugada($nombre);

        return $this->jsonResponse('success', $result, 200);
    }
}