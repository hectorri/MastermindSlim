<?php
namespace App\Controller\Jugada;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Representa el controlador encargado de la operación de creación de Jugadas
 */
class DeleteJugada extends BaseJugada {

	public function __invoke($request, $response, $args){
		$this->setParams($request, $response, $args);
		//Recogemos el identificador y nombre de la jugada a eliminar
		$idJugada = $this->args['idJugada'];
		$nombrePartida = $this->args['nombrePartida'];
		//Eliminamos la jugada
		$result = $this->getJugadaResource()->deleteJugada($idJugada, $nombrePartida);
		//Evaluamos el resultado
		if ($result == null) {
			//La operación no ha tenido éxito
			$params = array('message' => 'Jugada no encontrada', 'idJugada' => $idJugada, 'nombrePartida' => $nombrePartida);
			return $this->jsonResponse('error', $params, 404);
		}
		//La operación se ha realizado correctamente
		return $this->jsonResponse('success', $result, 200);
	}
}