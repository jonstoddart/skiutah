<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), ['twig.path' => __DIR__ . '/../views']);

$app->mount('/', new SkiUtah\Provider\DefaultControllerProvider());

$app->run();