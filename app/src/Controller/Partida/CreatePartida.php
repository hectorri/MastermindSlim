<?php

namespace App\Controller\Partida;

use App\Controller\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Create Partida Controller.
 */
class CreatePartida extends BaseController
{
  protected $partidaResource;

  /**
   * @param Container $container
   */
  public function __construct(Container $container)
  {
    $this->logger = $container->get('logger');
    $this->partidaResource = $container->get('partida_resource');
  }

  protected function getPartidaResource()
  {
    return $this->partidaResource;
  }

  /**
  * @return array
  */
  protected function getInput()
  {
    return $this->request->getParsedBody();
  }

  /**
  * Create Partida.
  *
  * @param Request $request
  * @param Response $response
  * @param array $args
  * @return Response
  */
  public function __invoke($request, $response, $args)
  {
    $this->setParams($request, $response, $args);
    $input = $this->getInput();
    $result = $this->getPartidaResource()->createPartida($input);
    return $this->jsonResponse('success', $result, 201);
  }
}
