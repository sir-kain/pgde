<?php

namespace Pgde\EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieHandicap
 *
 * @ORM\Table(name="categorie_handicap")
 * @ORM\Entity(repositoryClass="Pgde\EmploiBundle\Repository\CategorieHandicapRepository")
 */
class CategorieHandicap
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
     * @ORM\OneToMany(targetEntity="Pgde\EmploiBundle\Entity\Handicap", mappedBy="categorie_handicap")
     */
    private $handicaps;

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
        $this->handicaps = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return CategorieHandicap
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
     * Add handicap.
     *
     * @param \Pgde\EmploiBundle\Entity\Handicap $handicap
     *
     * @return CategorieHandicap
     */
    public function addHandicap(\Pgde\EmploiBundle\Entity\Handicap $handicap)
    {
        $this->handicaps[] = $handicap;

        return $this;
    }

    /**
     * Remove handicap.
     *
     * @param \Pgde\EmploiBundle\Entity\Handicap $handicap
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeHandicap(\Pgde\EmploiBundle\Entity\Handicap $handicap)
    {
        return $this->handicaps->removeElement($handicap);
    }

    /**
     * Get handicaps.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHandicaps()
    {
        return $this->handicaps;
    }

    public function __toString()
    {
        return $this->libelle;
    }
}
