<?php

use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Lokhman\Silex\Provider\ConfigServiceProvider;
use SkiUtah\Provider\RoutingProvider;

require_once __DIR__ . '/../../vendor/autoload.php';

$app = new Silex\Application();

$app->error(function (Exception $e) use ($app) {
    return new \Symfony\Component\HttpFoundation\Response("Something goes terribly wrong: " . $e->getMessage());
});

$app->register(new ConfigServiceProvider(), ['config.dir' => __DIR__ . '/../config']);

$app->register(new Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => [
        'driver' => $app['config']['db']['driver'] ?: 'pdo_mysql',
        'dbname' => $app['config']['db']['dbname'],
        'host' => $app['config']['db']['host'],
        'user' => $app['config']['db']['user'],
        'password' => $app['config']['db']['password'],
        'port' => $app['config']['db']['port'] ?: 3306
    ]
]);

$app->register(new DoctrineOrmServiceProvider(), [
    'orm.proxies_dir' => '/tmp',
    'orm.em.options' => [
        'mappings' => [
            [
                'type' => 'annotation',
                'namespace' => 'SkiUtah\Entity',
                'path' => __DIR__ . '/../Entity',
                'use_simple_annotation_reader' => false
            ]
        ]
    ]
]);

$app->register(new Silex\Provider\TwigServiceProvider(), ['twig.path' => __DIR__ . '/../views']);
$app['twig']->addGlobal('baseurl', $app['config']['baseurl']);

$app->mount('/', new RoutingProvider());

$app->run();