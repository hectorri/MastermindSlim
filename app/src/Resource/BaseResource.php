<?php
namespace App\Resource;

use Slim\Http\Request;
use Slim\Http\Response;
use Monolog\Logger;
use \Doctrine\ORM\Tools\Setup;
use \Doctrine\ORM\EntityManager;

/**
 * Representa la parte común de los gestores de datos
 */
abstract class BaseResource {
	/**
	 * @var Logger $logger
	 */
	protected $logger;

	/**
	 * Referencia al gestor de datos
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $entityManager = null;

	/**
	 * Obtiene el gestor de datos
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function getEntityManager() {
		if ($this->entityManager === null) {
			$this->entityManager = $this->createEntityManager();
		}
		return $this->entityManager;
	}

	/**
	 * Representa el gestor de datos e incluye los parámetros de conexión a la BD
	 * @return EntityManager
	 */
	public function createEntityManager() {
		$path = array('app/src/Entity');
		$devMode = true;

		$config = Setup::createAnnotationMetadataConfiguration($path, $devMode,
		null, null, false);

		$connectionOptions = array(
		'driver'   => 'pdo_mysql',
		'host'	 => 'localhost',
		'dbname'   => 'mastermindslim',
		'user'	 => 'mastermindslim',
		'password' => 'mastermindslim',
		);

		return EntityManager::create($connectionOptions, $config);
	}
}
