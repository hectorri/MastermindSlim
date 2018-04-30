<?php
namespace App\Controller\Jugada;

use App\Controller\BaseController;
use App\Service\JugadaService;
use Slim\Container;

/**
 * Representa la parte común de todas las consultas sobre recursos de tipo Jugada
 */
abstract class BaseJugada extends BaseController {

  //Referencia al gestor de jugadas
  protected $jugadaResource;

  /**
   * Constructor por defecto
   * @param Container $container
   */
  public function __construct(Container $container) {
    $this->logger = $container->get('logger');
    $this->jugadaResource = $container->get('jugada_resource');
  }

  /**
   * Obtener gestor de Jugadas
   */
  protected function getJugadaResource() {
    return $this->jugadaResource;
  }

  /**
   * Obtiene la entrada de la petición
   * @return array
   */
  protected function getInput() {
    return $this->request->getParsedBody();
  }
}
