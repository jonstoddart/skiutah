<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Lokhman\Silex\Provider\ConfigServiceProvider;

$app = new Silex\Application();

$app->register(new ConfigServiceProvider(), ['config.dir' => __DIR__ . '/../config']);

$app->register(new Silex\Provider\TwigServiceProvider(), ['twig.path' => __DIR__ . '/../views']);
$app['twig']->addGlobal('baseurl', $app['config']['baseurl']);

$app->mount('/', new SkiUtah\Provider\DefaultControllerProvider());

$app->run();