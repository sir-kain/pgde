<?php

namespace Pgde\EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Handicap
 *
 * @ORM\Table(name="handicap")
 * @ORM\Entity(repositoryClass="Pgde\EmploiBundle\Repository\HandicapRepository")
 */
class Handicap
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Pgde\EmploiBundle\Entity\CategorieHandicap", inversedBy="handicaps")
     * @ORM\JoinColumn(name="categorie_handicap_id", referencedColumnName="id")
     */
    private $categorie_handicap;

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
     * @return Handicap
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
     * Set categorieHandicap.
     *
     * @param \Pgde\EmploiBundle\Entity\CategorieHandicap|null $categorieHandicap
     *
     * @return Handicap
     */
    public function setCategorieHandicap(\Pgde\EmploiBundle\Entity\CategorieHandicap $categorieHandicap = null)
    {
        $this->categorie_handicap = $categorieHandicap;

        return $this;
    }

    /**
     * Get categorieHandicap.
     *
     * @return \Pgde\EmploiBundle\Entity\CategorieHandicap|null
     */
    public function getCategorieHandicap()
    {
        return $this->categorie_handicap;
    }
}
