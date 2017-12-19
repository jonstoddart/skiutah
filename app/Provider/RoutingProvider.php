<?php

namespace SkiUtah\Provider;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class RoutingProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', 'SkiUtah\\Controller\\DefaultController::index');

        $controllers->get('/resort/{slug}', 'SkiUtah\\Controller\\ResortController::read');

        return $controllers;
    }
}