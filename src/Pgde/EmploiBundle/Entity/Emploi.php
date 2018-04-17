<?php

namespace Pgde\EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emploi
 *
 * @ORM\Table(name="emploi")
 * @ORM\Entity(repositoryClass="Pgde\EmploiBundle\Repository\EmploiRepository")
 */
class Emploi
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
     * @ORM\ManyToOne(targetEntity="Pgde\EmploiBundle\Entity\Secteur", inversedBy="emplois")
     * @ORM\JoinColumn(name="secteur_id", referencedColumnName="id")
     */
    private $secteur;

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
     * @return Emploi
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
     * Set secteur.
     *
     * @param \Pgde\EmploiBundle\Entity\Secteur|null $secteur
     *
     * @return Emploi
     */
    public function setSecteur(\Pgde\EmploiBundle\Entity\Secteur $secteur = null)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur.
     *
     * @return \Pgde\EmploiBundle\Entity\Secteur|null
     */
    public function getSecteur()
    {
        return $this->secteur;
    }
}
