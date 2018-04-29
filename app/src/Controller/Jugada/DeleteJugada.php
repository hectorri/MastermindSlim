<?php

namespace App\Controller\Jugada;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Delete Jugada Controller.
 */
class DeleteJugada extends BaseControler {

	protected $partidaResource;

	public function __construct(Container $container){
		$this->logger = $container->get('logger');
		$this->partidaResource = $container->get('partida_resource');
	}

	protected function getPartidaResource() {
		return $this->partidaResource;
	}
    public function __invoke($request, $response, $args){

        $this->setParams($request, $response, $args);
        $nombre = $this->args['nombre'];
        $result = $this->getJugadaResource()->deletePartida($nombre);

        return $this->jsonResponse('success', $result, 200);
    }
}