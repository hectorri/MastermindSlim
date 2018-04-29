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
    $jugadas = $this->getEntityManager()->getRepository('App\Entity\Jugada')->findAll();
    $jugadas = array_map(function($jugada) {
      return $this->convertToArray($jugada); },
      $jugadas);

    return $jugadas;
  }

    public function deleteJugada($nombre){
        $response = $this->getEntityManager()->getRepository('App\Entity\Jugada')->delete($nombre);
        return $response;
    }

	private function convertToArray(Jugada $jugada) {
		return array(
			'idJugada' => $jugada->getIdJugada(),
      'nombrePartida'  => $jugada->getNombrePartida(),
      'fecha' => $jugada->getFecha(),
			'codigoJugada' => $jugada->getCodigoJugada(),
			'resultado' => $jugada->getResultadoJugada()
		);
	}
}