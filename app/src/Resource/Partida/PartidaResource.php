<?php

namespace App\Resource\Partida;

use App\Entity\Partida;
use App\Resource\BaseResource;
use Slim\Container;

class PartidaResource extends BaseResource
{
  /**
   * @param Container $container
   */
  public function __construct(Container $container)
  {
    $this->logger = $container->get('logger');
  }

  public function getPartidas()
  {
    $partidas = $this->getEntityManager()->getRepository('App\Entity\Partida')->findAll();
	  $partidas = array_map(function($partida) {
                return $this->convertToArray($partida); },
                $partidas);
    return $partidas;
  }


	private function convertToArray(Partida $partida) {
    $array = (array) $partida;
    return $array;
		/*return array(
			'nombre' => $partida->getNombre(),
			'fecha'  => $partida->getFecha(),
			'codigo' => $partida->getCodigo(),
			'estado' => $partida->getEstado()
		);*/
	}
}	