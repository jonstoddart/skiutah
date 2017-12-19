<?php

namespace SkiUtah\Provider;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class DefaultControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', 'SkiUtah\\Controller\\DefaultController::index');

        return $controllers;
    }
}