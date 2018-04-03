<?php

namespace Pgde\EmploiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PgdeEmploiBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
