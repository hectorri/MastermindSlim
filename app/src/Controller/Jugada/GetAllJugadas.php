<?php

namespace App\Controller\Jugada;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Get All Jugadas Controller.
 */
class GetAllJugadas extends BaseController
{
  protected $jugadaResource;

  /**
   * @param Container $container
   */
  public function __construct(Container $container)
  {
    $this->logger = $container->get('logger');
    $this->jugadaResource = $container->get('jugada_resource');
  }

  protected function getJugadaResource()
  {
    return $this->jugadaResource;
  }

  /**
     * Get all Jugadas.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke($request, $response, $args)
    {
        $this->setParams($request, $response, $args);
        $result = $this->getJugadaResource()->getJugadas();

        return $this->jsonResponse('success', $result, 200);
    }
}
