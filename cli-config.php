<?php

use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Lokhman\Silex\Provider\ConfigServiceProvider;

require_once 'vendor/autoload.php';

$app = new Silex\Application();

$app->register(new ConfigServiceProvider(), ['config.dir' => __DIR__ . '/app/config']);

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
                'path' => __DIR__.'/../Entity',
            ]
        ]
    ]
]);

$entityManager = $app['orm.em'];

return ConsoleRunner::createHelperSet($entityManager);