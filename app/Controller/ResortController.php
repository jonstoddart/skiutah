<?php

namespace SkiUtah\Controller;

use Silex\Application;
use SkiUtah\Model\ResortModel;
use Symfony\Component\HttpFoundation\Request;

class ResortController extends BaseController
{
    public function read(Request $request, Application $app, $slug)
    {
        $Resorts = new ResortModel();
        return $app['twig']->render('resort/read.twig', [
            'resort' => $Resorts->getResortBySlug($app, $slug)
        ]);
    }
}