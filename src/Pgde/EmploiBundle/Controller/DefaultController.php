<?php

namespace Pgde\EmploiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@PgdeEmploi/Default/index.html.twig');
    }
}
