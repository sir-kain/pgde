<?php
/**
 * Created by PhpStorm.
 * User: waly
 * Date: 30/07/18
 * Time: 11:36
 */

namespace Pgde\EmploiBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class StatsAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'stats';
    protected $baseRouteName = 'stats';

    protected function configureRoutes(RouteCollection $collection)
    {
//        $collection->clearExcept(['list']);
    }
}