<?php
namespace App\Controller\Jugada;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Representa el controlador que obtiene las jugadas de una partida
 */
class GetJugadasPartida extends BaseJugada {
	/**
     * Get all Jugadas by Partida.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke($request, $response, $args) {
        $this->setParams($request, $response, $args);
		//Recogemos el nombre de la partida a consultar
		$nombrePartida = $this->args['nombrePartida'];
		//Obtenemos las jugadas
        $result = $this->getJugadaResource()->getJugadasPartida($nombrePartida);
		//Devolvemos las jugadas
        return $this->jsonResponse('success', $result, 200);
    }
}
