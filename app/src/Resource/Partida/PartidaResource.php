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
    $partida = new Partida();
    if ($data != null) {
      $partida->setNombre($data['nombre']);
      if ($this->checkPartida($partida) == null) {
        if ($data['fecha'] == null) {
          $data['fecha'] = date('d/m/Y');
        }
        $partida->setFecha(DateTime::createFromFormat('d/m/Y', $data['fecha']));
        if ($data['codigo'] == null) {
          $data['codigo'] = $this->generateRandomCodigo();
        }
        $partida->setCodigo($data['codigo']);
        $partida->setEstado(1);
        $this->getEntityManager()->persist($partida);
        $this->getEntityManager()->flush();
      }
      $partida = $this->checkPartida($partida);
    }
    return $partida;
  }

  public function checkPartida($partida)
  {
    $partida = $this->getEntityManager()->getRepository('App\Entity\Partida')->find($partida->getNombre());
    return $partida;
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