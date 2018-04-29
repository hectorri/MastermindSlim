<?php

namespace App\Controller\Jugada;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Create Jugada Controller.
 */
class CreateJugada extends BaseJugada
{
    /**
     * Create a jugada.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke($request, $response, $args)
    {
        $this->setParams($request, $response, $args);
        $input = $this->getInput();
        $result = $this->getJugadaResource()->createJugada($input);

        return $this->jsonResponse('success', $result, 201);
    }
}
