<?php

namespace Pgde\EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="Pgde\EmploiBundle\Repository\DepartementRepository")
 */
class Departement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Pgde\EmploiBundle\Entity\Region", inversedBy="departements")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;


    public function __toString()
    {
        return $this->libelle;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Departement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set region.
     *
     * @param \Pgde\EmploiBundle\Entity\Region|null $region
     *
     * @return Departement
     */
    public function setRegion(\Pgde\EmploiBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region.
     *
     * @return \Pgde\EmploiBundle\Entity\Region|null
     */
    public function getRegion()
    {
        return $this->region;
    }
}
