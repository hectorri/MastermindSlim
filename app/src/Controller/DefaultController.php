<?php

namespace App\Controller;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Default Controller.
 */
class DefaultController extends BaseController
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->logger = $container->get('logger');
    }

    /**
     * Get Help.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getHelp($request, $response, $args)
    {
        $this->setParams($request, $response, $args);
        $url = 'http://localhost:8081/';
        $message = [
            'partidas' => $url . 'api/v1/partidas',
            'jugadas' => $url . 'api/v1/jugadas',
            'status' => $url . 'status',
            'version' => $url . 'version',
            'ayuda' => $url . '',
        ];

        return $this->jsonResponse('success', $message, 200);
    }

    /**
     * Get Api Version.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getVersion($request, $response, $args)
    {
        $this->setParams($request, $response, $args);
        $version = [
            'version' => '1',
        ];

        return $this->jsonResponse('success', $version, 200);
    }

    /**
     * Get Api Status.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getStatus($request, $response, $args)
    {
        $this->setParams($request, $response, $args);
        $status = [
            'status' => 'OK',
        ];

        return $this->jsonResponse('success', $status, 200);
    }
}