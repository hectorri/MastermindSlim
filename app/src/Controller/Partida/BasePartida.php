<?php
namespace App\Controller\Partida;

use App\Controller\BaseController;
use App\Service\PartidaService;
use Slim\Container;

/**
 * Representa la parte común de todas las consultas sobre recursos de tipo Partida
 */
abstract class BasePartida extends BaseController {

	//Referencia al gestor de partidas
	protected $partidaResource;

	/**
	 * Constructor por defecto
	 * @param Container $container
	 */
	public function __construct(Container $container) {
		$this->logger = $container->get('logger');
		$this->partidaResource = $container->get('partida_resource');
	}

	/**
	 * Obtener gestor de Jugadas
	 */
	protected function getPartidaResource() {
		return $this->partidaResource;
	}

	/**
	 * Obtiene la entrada de la petición
	 * @return array
	 */
	protected function getInput() {
		return $this->request->getParsedBody();
	}

}
