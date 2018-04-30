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

  public function getJugadasPartida($nombrePartida)
  {
	$params = array('nombrePartida' => $nombrePartida);
    $jugadas = $this->getEntityManager()->getRepository('App\Entity\Jugada')->findBy($params);
    $jugadas = array_map(function($jugada) {
      return $this->convertToArray($jugada); },
      $jugadas);

    return $jugadas;
  }

  public function deleteJugada($idJugada, $nombrePartida){
    $jugada = new Jugada();
    if ($idJugada != null && $nombrePartida != null) {
      $jugada->setIdJugada($idJugada);
      $jugada->setNombrePartida($nombrePartida);
      $jugada = $this->checkJugada($jugada);
      if ($jugada != null) {
        $this->getEntityManager()->remove($jugada);
        $this->getEntityManager()->flush();
      }
    }
    return $jugada;
  }

  public function createJugada($data)
  {
    $jugada = new Jugada();
    //Se valida si hay datos
    if ($data != null) {
      $jugada->setIdJugada($data['idJugada']);
      $jugada->setNombrePartida($data['nombrePartida']);
      if ($this->checkJugada($jugada) == null) {
        if (empty($data['fecha']) || $data['fecha'] == null) {
          $data['fecha'] = date('d/m/Y');
        }
        $jugada->setFecha(DateTime::createFromFormat('d/m/Y', $data['fecha']));
        if (empty($data['codigoJugada']) || $data['codigoJugada'] == null) {
          $data['codigoJugada'] = '';
        }
        $jugada->setCodigoJugada($data['codigoJugada']);
        //Se evalua la jugada
        $jugada->setResultadoJugada($this->calcularResultado($jugada->getNombrePartida(), $jugada->getCodigoJugada()));
        $this->getEntityManager()->persist($jugada);
        $this->getEntityManager()->flush();
      }
      $jugada = $this->checkJugada($jugada);
    }
    return $this->convertToArray($jugada);
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