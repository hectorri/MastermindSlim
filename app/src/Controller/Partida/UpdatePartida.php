<?php

namespace App\Controller\Partida;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Representa el controlador que actualiza una partida
 */
class UpdatePartida extends BasePartida {
  
	/**
	* Update Partida.
	*
	* @param Request $request
	* @param Response $response
	* @param array $args
	* @return Response
	*/
	public function __invoke($request, $response, $args) {
		$this->setParams($request, $response, $args);
		$input = $this->getInput();
		//Recogemos el parámetro de la partida a actualizar
		$nombreLeido = $this->args['nombre'];
		//Actualizamos la partida
		$result = $this->getPartidaResource()->updatePartida($input, $nombreLeido);
		//Evaluamos el resultado
		if ($result == null) {
			//La operación no ha tenido éxito
			return $this->jsonResponse('error', $result, 404);
		}
		//La operación se ha realizado correctamente
		return $this->jsonResponse('success', $result, 200);
	}
}
