<?php
namespace App\Controller\Jugada;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Representa el controlador que obtiene las jugadas almacenadas
 */
class GetAllJugadas extends BaseJugada {

	/**
	 * Obtiene todas las jugadas
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param array $args
	 * @return Response
	 */
    public function __invoke($request, $response, $args) {
        $this->setParams($request, $response, $args);
		//Obtenemos las jugadas
        $result = $this->getJugadaResource()->getJugadas();
		//Devolvemos las jugadas obtenidas
        return $this->jsonResponse('success', $result, 200);
    }
}
