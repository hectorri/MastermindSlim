<?php

namespace App\Controller\Jugada;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Get All Jugadas by Partida Controller.
 */
class GetJugadasPartida extends BaseJugada
{
  /**
     * Get all Jugadas by Partida.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke($request, $response, $args)
    {
        $this->setParams($request, $response, $args);
		$nombrePartida = $this->args['nombrePartida'];
        $result = $this->getJugadaResource()->getJugadasPartida($nombrePartida);

        return $this->jsonResponse('success', $result, 200);
    }
}
