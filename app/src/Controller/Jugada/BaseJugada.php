<?php

namespace App\Controller\Jugada;

use App\Controller\BaseController;
use App\Service\JugadaService;
use Slim\Container;

/**
 * Base Jugada Controller.
 */
abstract class BaseJugada extends BaseController
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
   * @return array
   */
  protected function getInput()
  {
    return $this->request->getParsedBody();
  }
}
