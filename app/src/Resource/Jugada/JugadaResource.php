<?php

namespace App\Resource\Jugada;

use \DateTime;
use App\Entity\Jugada;
use App\Resource\BaseResource;
use Slim\Container;

/**
 * Representa el gestor de Jugadas
 */
class JugadaResource extends BaseResource {

	/**
	 * Constructor
	 * @param Container $container
	 */
	public function __construct(Container $container) {
		$this->logger = $container->get('logger');
	}

	/**
	 * Obtiene todas las jugadas almacenadas
	 */
	public function getJugadas() {
		//Obtenemos las jugadas
		$jugadas = $this->getEntityManager()->getRepository('App\Entity\Jugada')->findAll();
		//Mapeamos el resultado
		$jugadas = array_map(function($jugada) {
				return $this->convertToArray($jugada); },
				$jugadas);
		//Devolvemos el resultado
		return $jugadas;
	}

	/**
	 * Obtiene las jugadas almacenadas para la partida consultada
	 */
	public function getJugadasPartida($nombrePartida) {
		$params = array('nombrePartida' => $nombrePartida);
		//Obtenemos las jugadas para la partida indicada
		$jugadas = $this->getEntityManager()->getRepository('App\Entity\Jugada')->findBy($params);
		$jugadas = array_map(function($jugada) {
			return $this->convertToArray($jugada); },
			$jugadas);
		//Devolvemos el resultado
		return $jugadas;
	}

	/**
	 * Borra una jugada de una partida
	 */
	public function deleteJugada($idJugada, $nombrePartida){
		$jugada = new Jugada();
		if ($idJugada != null && $nombrePartida != null) {
			//Generamos el objeto jugada con los parámetros a eliminar
			$jugada->setIdJugada($idJugada);
			$jugada->setNombrePartida($nombrePartida);
			//Comprobamos que la jugada existe
			$jugada = $this->checkJugada($jugada);
			if ($jugada != null) {
				//Eliminamos la jugada
				$this->getEntityManager()->remove($jugada);
				$this->getEntityManager()->flush();
			}
		}
		return $jugada;
	}

	/**
	 * Crea una nueva jugada de una partida
	 */
	public function createJugada($data) {
		$jugada = new Jugada();
		//Se valida si hay datos
		if ($data != null) {
			$jugada->setIdJugada($data['idJugada']);
			$jugada->setNombrePartida($data['nombrePartida']);
			//Comprobamos que no exista la jugada
			if ($this->checkJugada($jugada) == null) {
				//Establecemos la fecha
				if (empty($data['fecha']) || $data['fecha'] == null) {
					$data['fecha'] = date('d/m/Y');
				}
				$jugada->setFecha(DateTime::createFromFormat('d/m/Y', $data['fecha']));
				//Establecemos la combinación de la jugada
				if (empty($data['codigoJugada']) || $data['codigoJugada'] == null) {
					$data['codigoJugada'] = '';
				}
				$jugada->setCodigoJugada($data['codigoJugada']);
				//Se evalua la jugada
				$jugada->setResultadoJugada($this->calcularResultado($jugada->getNombrePartida(), $jugada->getCodigoJugada()));
				//Almacenamos la jugada
				$this->getEntityManager()->persist($jugada);
				$this->getEntityManager()->flush();
			}
			//Comprobamos la jugada almacenada
			$jugada = $this->checkJugada($jugada);
		}
		return $this->convertToArray($jugada);
	}

	/*
	 * Evalua el resultado de una jugada
	 */
	private function calcularResultado($nombrePartida, $codigoJugada) {
		$result = 'KO';
		//Obtenemos la partida para recoger la combinación seleccionada
		$partida = $this->getEntityManager()->getRepository('App\Entity\Partida')->find($nombrePartida);
		if ($partida != null) {
			//Evaluamos si coincide
			if($codigoJugada == $partida->getCodigo()) {
				$result = 'OK';
			}
		}
		//Devolvemos el resultado
		return $result;
	}

	/*
	 * Comprueba si existe una jugada
	 */
	public function checkJugada($jugada) {
		$params = array('idJugada' => $jugada->getIdJugada(), 'nombrePartida' => $jugada->getNombrePartida());
		$jugada = $this->getEntityManager()->getRepository('App\Entity\Jugada')->find($params);
		return $jugada;
	}

	/*
	 * Mapeo de atributos de jugadas
	 */
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