<?php

namespace App\Controller\Partida;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Create Partida Controller.
 */
class CreatePartida extends BasePartida {

	/**
	 * Método que crea una partida
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 * @return Response
	 */
	public function __invoke($request, $response, $args) {
		$this->setParams($request, $response, $args);
		//Recogemos la partida
		$input = $this->getInput();
		//Insertamos la partida
		$result = $this->getPartidaResource()->createPartida($input);
		//Evaluamos el resultado de la operación
		if ($result == null) {
			//La operación no ha tenido éxito
			return $this->jsonResponse('error', $result, 404);
		}
		//La operación no ha tenido éxito
		return $this->jsonResponse('success', $result, 201);
	}
}
