<?php
/**
 * Created by PhpStorm.
 * User: waly
 * Date: 28/07/18
 * Time: 15:35
 */

namespace Pgde\EmploiBundle\Controller;


use Sonata\AdminBundle\Controller\CRUDController;

class StatsCRUDController extends CRUDController
{
    public function listAction()
    {
        return $this->render('stats.html.twig');
    }
}