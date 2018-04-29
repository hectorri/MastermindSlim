<?php

namespace App\Resource\Jugada;

use \DateTime;
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

  public function createJugada($data)
  {
    $jugada = new Jugada();
    if ($data != null) {
      $jugada->setIdJugada($data['idJugada']);
      $jugada->setNombrePartida($data['nombrePartida']);
      if ($data['fecha'] == null) {
        $data['fecha'] = date('d/m/Y');
      }
      $jugada->setFecha(DateTime::createFromFormat('d/m/Y', $data['fecha']));
      $jugada->setCodigoJugada($data['codigoJugada']);
      $jugada->setResultadoJugada($this->calcularResultado($jugada->getNombrePartida(), $jugada->getCodigoJugada()));
      $this->getEntityManager()->persist($jugada);
      $this->getEntityManager()->flush();

      $jugada = $this->checkJugada($jugada);
    }
    return $jugada;
  }

  private function calcularResultado($nombrePartida, $codigoJugada)
  {
    $result = 'KO';
    $partida = $this->getEntityManager()->getRepository('App\Entity\Partida')->find($nombrePartida);
    if ($partida != null) {
      if($codigoJugada == $partida->getCodigo()) {
        $result = 'OK';
      }
    }
    return $result;
  }

  public function checkJugada($jugada)
  {
    $params = array('idJugada' => $jugada->getIdJugada(), 'nombrePartida' => $jugada->getNombrePartida());
    $jugada = $this->getEntityManager()->getRepository('App\Entity\Jugada')->find($params);
    return $jugada;
  }
}