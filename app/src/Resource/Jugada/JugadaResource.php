<?php

namespace App\Resource\Jugada;

use App\Entity\Jugada;
use App\Resource\BaseResource;
use Slim\Container;

class JugadaResource extends BaseResource
{
  /**
   * @param Container $container
   */
  public function __construct(Container $container)
  {
    $this->logger = $container->get('logger');
  }

  public function getJugadas()
  {
    $partidas = $this->getEntityManager()->getRepository('App\Entity\Jugada')->findAll();

    return $partidas;
  }
}