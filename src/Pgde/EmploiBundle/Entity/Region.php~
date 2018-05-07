<?php

namespace Pgde\EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass="Pgde\EmploiBundle\Repository\RegionRepository")
 */
class Region
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
     * @ORM\OneToMany(targetEntity="Pgde\EmploiBundle\Entity\Departement", mappedBy="region")
     */
    private $departements;

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
     * Constructor
     */
    public function __construct()
    {
        $this->departements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Region
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
     * Add departement.
     *
     * @param \Pgde\EmploiBundle\Entity\Departement $departement
     *
     * @return Region
     */
    public function addDepartement(\Pgde\EmploiBundle\Entity\Departement $departement)
    {
        $this->departements[] = $departement;

        return $this;
    }

    /**
     * Remove departement.
     *
     * @param \Pgde\EmploiBundle\Entity\Departement $departement
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDepartement(\Pgde\EmploiBundle\Entity\Departement $departement)
    {
        return $this->departements->removeElement($departement);
    }

    /**
     * Get departements.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartements()
    {
        return $this->departements;
    }
}
