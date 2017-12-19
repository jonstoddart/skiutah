<?php

namespace SkiUtah\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    public function index(Request $request, Application $app)
    {
        return $app['twig']->render('home/index.twig');
    }
}