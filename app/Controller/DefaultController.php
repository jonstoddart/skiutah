<?php

namespace SkiUtah\Controller;

use Silex\Application;
use SkiUtah\Model\ResortModel;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    public function index(Request $request, Application $app)
    {
        $Resorts = new ResortModel();
        return $app['twig']->render('home/index.twig', [
            'resorts' => $Resorts->getResorts($app)
        ]);
    }
}