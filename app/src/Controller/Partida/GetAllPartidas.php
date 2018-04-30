<?php
namespace App\Controller\Partida;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Representa el controlador que obtiene las partidas almacenadas
 */
class GetAllPartidas extends BasePartida {

	/**
	 * Obtiene todas las partidas
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 * @return Response
	 */
	public function __invoke($request, $response, $args) {
		$this->setParams($request, $response, $args);
		//Obtenemos las partidas
		$result = $this->getPartidaResource()->getPartidas();
		//Devolvemos las partidas
		return $this->jsonResponse('success', $result, 200);
	}
}
