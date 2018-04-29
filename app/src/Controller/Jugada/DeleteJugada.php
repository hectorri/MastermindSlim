<?php

namespace App\Controller\Jugada;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

/**
 * Delete Jugada Controller.
 */
class DeleteJugada extends BaseJugada {

  public function __invoke($request, $response, $args){
	    $this->setParams($request, $response, $args);
      //$input = $this->getInput();
      $idJugada = $this->args['idJugada'];
      $nombrePartida = $this->args['nombrePartida'];
      $result = $this->getJugadaResource()->deleteJugada($idJugada, $nombrePartida);
      if ($result == null) {
        $params = array('message' => 'Jugada no encontrada', 'idJugada' => $idJugada, 'nombrePartida' => $nombrePartida);
        return $this->jsonResponse('error', $params, 404);
      }
      return $this->jsonResponse('success', $result, 200);
    }
}