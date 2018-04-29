<?php

namespace App\Controller\Partida;

use App\Controller\BaseController;
use App\Service\PartidaService;
use Slim\Container;

/**
 * Base Jugada Controller.
 */
abstract class BasePartida extends BaseController
{
  protected $partidaResource;

  /**
   * @param Container $container
   */
  public function __construct(Container $container)
  {
    $this->logger = $container->get('logger');
    $this->partidaResource = $container->get('partida_resource');
  }

  protected function getPartidaResource()
  {
    return $this->partidaResource;
  }

  /**
  * @return array
  */
  protected function getInput()
  {
    return $this->request->getParsedBody();
  }

}
