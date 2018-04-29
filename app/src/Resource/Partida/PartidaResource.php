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
		return array(
			'nombre' => $partida->getNombre(),
			'fecha'  => $partida->getFecha(),
			'codigo' => $partida->getCodigo(),
			'estado' => $partida->getEstado()
		);
  }
  
  /* Create partida
  *
  *  @param array|object|null $input
  *  @return object
  */
  public function createPartida($data)
  {
    $codigoJugada = $this->generateRandomCodigo();

    date_default_timezone_set('UTC');

    $partida = new Partida();
    $partida->setNombre("PROBANDO"/*$data("nombre")*/);
    $partida->setFecha(date('d/m/Y'));//FechaActual
    $partida->setCodigo($codigoJugada);
    $this->getEntityManager()->persist($partida);
    
    return (json_encode($partida));
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