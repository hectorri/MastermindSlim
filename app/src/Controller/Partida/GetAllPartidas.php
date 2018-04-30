<?php

namespace App\Controller\Partida;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Get All Partidas Controller.
 */
class GetAllPartidas extends BasePartida
{

  /**
     * Get all Partidas.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke($request, $response, $args)
    {
        $this->setParams($request, $response, $args);
        $result = $this->getPartidaResource()->getPartidas();

        return $this->jsonResponse('success', $result, 200);
    }
}
