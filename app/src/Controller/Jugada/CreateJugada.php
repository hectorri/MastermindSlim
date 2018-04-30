<?php
namespace App\Controller\Jugada;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Representa el controlador encargado de la operación de creación de Jugadas
 */
class CreateJugada extends BaseJugada {

    /**
     * Método que crea una jugada
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke($request, $response, $args) {
        $this->setParams($request, $response, $args);
		//Recogemos la jugada
        $input = $this->getInput();
		//Insertamos la jugada
        $result = $this->getJugadaResource()->createJugada($input);
		//Evaluamos el resultado de la operacion
        if ($result == null) {
			//La operación no ha tenido éxito
			return $this->jsonResponse('error', $result, 404);
        }
		//La operación ha tenido éxito
        return $this->jsonResponse('success', $result, 201);
    }
}
