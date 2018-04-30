<?php
namespace App\Resource\Partida;

use \DateTime;
use App\Entity\Partida;
use App\Resource\BaseResource;
use Slim\Container;

/**
 * Representa el gestor de Partidas
 */
class PartidaResource extends BaseResource {

	/**
	 * Constructor
	 * @param Container $container
	 */
	public function __construct(Container $container) {
		$this->logger = $container->get('logger');
	}

	/**
	 * Obtiene todas las partidas almacenadas
	 */
	public function getPartidas() {
		//Obtenemos las partidas
		$partidas = $this->getEntityManager()->getRepository('App\Entity\Partida')->findAll();
		//Mapeamos el resultado
		$partidas = array_map(function($partida) {
			return $this->convertToArray($partida); },
			$partidas);
		//Devolvemos las partidas
		return $partidas;
	}

	/**
	 *	Crea una partida nueva
	 *  @param array|object|null $data
	 *  @return object
	 */
	public function createPartida($data) {
		$partida = new Partida();
		if ($data != null) {
			$partida->setNombre($data['nombre']);
			//Comprobamos si ya existe una partida con ese nombre
			if ($this->checkPartida($partida) == null) {
				if (empty($data['fecha']) || $data['fecha'] == null) {
					//Establecemos la fecha actual si no se ha indicado otra
					$data['fecha'] = date('d/m/Y');
				}
				//Formateamos y guardamos la fecha en el objeto partida
				$partida->setFecha(DateTime::createFromFormat('d/m/Y', $data['fecha']));

				//Generamos un código aleatorio si no se ha indicado otro
				if (empty($data['codigo']) || $data['codigo'] == null) {
					$data['codigo'] = $this->generateRandomCodigo();
				}

				$partida->setCodigo($data['codigo']);
				$partida->setEstado(1);
				//Guardamos la partida
				$this->getEntityManager()->persist($partida);
				$this->getEntityManager()->flush();
			}
			$partida = $this->checkPartida($partida);
		}
		return $this->convertToArray($partida);
	}

	/*
	 * Comprueba si la partida ya existe 
	 */
	public function checkPartida($partida) {
		$partida = $this->getEntityManager()->getRepository('App\Entity\Partida')->find($partida->getNombre());
		return $partida;
	}

	/* 
	 * Genera el código inicial de la partida 
	 */
	public function generateRandomCodigo($length = 6) {
		$characters = 'ABCDEF';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	/**
	 * Actualiza el estado de la partida
	 */
	public function updatePartida($data, $nombre) {
		$partida = new Partida();
		$partida->setNombre($nombre);
		//Comprobamos si la partida a actualizar existe
		$partida = $this->checkPartida($partida);
		if ($partida != null) {
			if ($data != null) {
				$partida->setEstado($data['estado']);
				//Actualizamos la partida
				$this->getEntityManager()->merge($partida);
				$this->getEntityManager()->flush();
			}
		}
		return $this->convertToArray($partida);
	}

	/*
	 * Mapeo de atributos de partidas
	 */
	private function convertToArray(Partida $partida) {
		return array(
		'nombre' => $partida->getNombre(),
		'fecha'  => $partida->getFecha(),
		'codigo' => $partida->getCodigo(),
		'estado' => $partida->getEstado()
		);
	}
}