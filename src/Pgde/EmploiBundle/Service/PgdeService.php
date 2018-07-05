<?php
/**
 * Created by PhpStorm.
 * User: waly
 * Date: 10/06/18
 * Time: 16:00
 */
namespace Pgde\EmploiBundle\Service;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class PgdeService
{
    public function serialise() {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        return $serializer;
    }
}