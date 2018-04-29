<?php

namespace App\Resource\Partida;

use \DateTime;
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
		return array(
			'nombre' => $partida->getNombre(),
			'fecha'  => $partida->getFecha(),
			'codigo' => $partida->getCodigo(),
			'estado' => $partida->getEstado()
		);
  }

  /* Create partida
  *
  *  @param array|object|null $data
  *  @return object
  */
  public function createPartida($data)
  {
    $codigoPartida = $this->generateRandomCodigo();
    $partida = new Partida();

    if ($data != null) {
      $partida->setNombre($data['nombre']);     
      $partida->setFecha(DateTime::createFromFormat('d/m/Y', date('d/m/Y')));
      $partida->setCodigo($codigoPartida);
      $partida->setEstado(1);
     // if ($this->existPartida($nombrePartida) == 'OK'){
        $this->getEntityManager()->persist($partida);
        $this->getEntityManager()->flush();
  
      //}
    }
    return $partida;
  }

  public function existPartida($nombrePartida)
  {
    $partida = $this->getEntityManager()->getRepository('App\Entity\Partida')->find($nombrePartida);
    $insert = 'OK';
    if ($partida != null) {     
        $insert = 'KO';
    }
    return $insert;
  }

  /* Genera el código inicial de la partida */
  public function generateRandomCodigo($length = 6) {
    $characters = 'ABCDEF';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
}	