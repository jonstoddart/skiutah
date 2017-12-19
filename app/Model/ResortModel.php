<?php

namespace SkiUtah\Model;

use Silex\Application;
use SkiUtah\Entity\ResortEntity;

class ResortModel extends BaseModel
{
    public function getResorts(Application $app)
    {
        return $app['orm.em']->getRepository('SkiUtah\Entity\ResortEntity')->findAll();
    }

    public function getResortBySlug(Application $app, $slug)
    {
        $resorts = $app['orm.em']->getRepository('SkiUtah\Entity\ResortEntity')->findAll();

        /** @var ResortEntity $resort */
        foreach ($resorts as $resort) {
            if ($resort->getResortSlug() == $slug) {
                return $resort;
            }
        }
    }
}