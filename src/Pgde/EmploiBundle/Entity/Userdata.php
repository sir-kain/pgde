<?php

namespace Pgde\EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Userdata
 *
 * @ORM\Table(name="userdata")
 * @ORM\Entity(repositoryClass="Pgde\EmploiBundle\Repository\UserdataRepository")
 */
class Userdata
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
     * @var \DateTime
     *
     * @ORM\Column(name="datenaiss", type="date", nullable=true)
     * @Assert\NotBlank(message="Merci de renseigner votre date de naissance")
     */
    private $datenaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuresidence", type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner votre lieu de naissance")
     */
    private $lieuresidence;

    /**
     * @var string
     *
     * @ORM\Column(name="lieunaiss", type="string", length=255)
     */
    private $lieunaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=10)
     * @Assert\NotBlank(message="Merci de renseigner votre genre")
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="situationmatrimoniale", type="string", length=255)
     */
    private $situationmatrimoniale;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone1", type="string", length=45)
     */
    private $telephone1;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone2", type="string", length=45, nullable=true)
     */
    private $telephone2;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreenfant", type="integer", nullable=true, options={"default" : 0})
     */
    private $nombreenfant;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=255)
     */
    private $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="autresdiplomes", type="string", length=255, nullable=true)
     */
    private $autresdiplomes;

    /**
     * @var string
     *
     * @ORM\Column(name="experiences", type="text", nullable=true)
     */
    private $experiences;

    /**
     * @var string
     *
     * @ORM\Column(name="motivation", type="text", nullable=true)
     */
    private $motivation;

    /**
     * @var int
     *
     * @ORM\Column(name="anneediplome", type="integer", nullable=true)
     */
    private $anneediplome;

    /**
     * @var int
     *
     * @ORM\Column(name="anneeexperience1", type="integer", nullable=true, options={"default" : 0})
     */
    private $anneeexperience1;

    /**
     * @var int
     *
     * @ORM\Column(name="anneeexperience2", type="integer", nullable=true, options={"default" : 0})
     */
    private $anneeexperience2;

    /**
     * @var string
     *
     * @ORM\Column(name="specialite", type="string", length=255, nullable=true)
     */
    private $specialite;

    /**
     * @var string
     *
     * @ORM\Column(name="etablissementdiplome", type="string", length=255, nullable=true)
     */
    private $etablissementdiplome;


    /**
     *
     * @ORM\ManyToOne(targetEntity="Pgde\EmploiBundle\Entity\Departement")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\NotBlank(message="Merci de renseigner votre departement de naissance")
     */
    private $departementnaiss;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Pgde\EmploiBundle\Entity\Departement")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\NotBlank(message="Merci de renseigner votre departement de residence")
     */
    private $departementresidence;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Pgde\EmploiBundle\Entity\Emploi")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\NotBlank(message="Merci de renseigner le type d'emploi demandé - Choix 1")
     */
    private $emploi1;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Pgde\EmploiBundle\Entity\Emploi")
     * @ORM\JoinColumn(nullable=true)
     */
    private $emploi2;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Pgde\EmploiBundle\Entity\Handicap")
     * @ORM\JoinColumn(nullable=true)
     */
    private $handicap;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Pgde\EmploiBundle\Entity\Academic")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\NotBlank(message="Merci de renseigner votre niveau d'etude")
     */
    private $academic;

    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="Pgde\EmploiBundle\Entity\Utilisateur", cascade={"persist"}, inversedBy="userdata")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;


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
     * Set datenaiss.
     *
     * @param \DateTime|null $datenaiss
     *
     * @return Userdata
     */
    public function setDatenaiss($datenaiss = null)
    {
        $this->datenaiss = $datenaiss;

        return $this;
    }

    /**
     * Get datenaiss.
     *
     * @return \DateTime|null
     */
    public function getDatenaiss()
    {
        return $this->datenaiss;
    }

    /**
     * Set lieuresidence.
     *
     * @param string $lieuresidence
     *
     * @return Userdata
     */
    public function setLieuresidence($lieuresidence)
    {
        $this->lieuresidence = $lieuresidence;

        return $this;
    }

    /**
     * Get lieuresidence.
     *
     * @return string
     */
    public function getLieuresidence()
    {
        return $this->lieuresidence;
    }

    /**
     * Set lieunaiss.
     *
     * @param string $lieunaiss
     *
     * @return Userdata
     */
    public function setLieunaiss($lieunaiss)
    {
        $this->lieunaiss = $lieunaiss;

        return $this;
    }

    /**
     * Get lieunaiss.
     *
     * @return string
     */
    public function getLieunaiss()
    {
        return $this->lieunaiss;
    }

    /**
     * Set genre.
     *
     * @param string $genre
     *
     * @return Userdata
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre.
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set situationmatrimoniale.
     *
     * @param string $situationmatrimoniale
     *
     * @return Userdata
     */
    public function setSituationmatrimoniale($situationmatrimoniale)
    {
        $this->situationmatrimoniale = $situationmatrimoniale;

        return $this;
    }

    /**
     * Get situationmatrimoniale.
     *
     * @return string
     */
    public function getSituationmatrimoniale()
    {
        return $this->situationmatrimoniale;
    }

    /**
     * Set telephone1.
     *
     * @param string $telephone1
     *
     * @return Userdata
     */
    public function setTelephone1($telephone1)
    {
        $this->telephone1 = $telephone1;

        return $this;
    }

    /**
     * Get telephone1.
     *
     * @return string
     */
    public function getTelephone1()
    {
        return $this->telephone1;
    }

    /**
     * Set telephone2.
     *
     * @param string|null $telephone2
     *
     * @return Userdata
     */
    public function setTelephone2($telephone2 = null)
    {
        $this->telephone2 = $telephone2;

        return $this;
    }

    /**
     * Get telephone2.
     *
     * @return string|null
     */
    public function getTelephone2()
    {
        return $this->telephone2;
    }

    /**
     * Set nombreenfant.
     *
     * @param int|null $nombreenfant
     *
     * @return Userdata
     */
    public function setNombreenfant($nombreenfant = null)
    {
        $this->nombreenfant = $nombreenfant;

        return $this;
    }

    /**
     * Get nombreenfant.
     *
     * @return int|null
     */
    public function getNombreenfant()
    {
        return $this->nombreenfant;
    }

    /**
     * Set diplome.
     *
     * @param string $diplome
     *
     * @return Userdata
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome.
     *
     * @return string
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * Set autresdiplomes.
     *
     * @param string|null $autresdiplomes
     *
     * @return Userdata
     */
    public function setAutresdiplomes($autresdiplomes = null)
    {
        $this->autresdiplomes = $autresdiplomes;

        return $this;
    }

    /**
     * Get autresdiplomes.
     *
     * @return string|null
     */
    public function getAutresdiplomes()
    {
        return $this->autresdiplomes;
    }

    /**
     * Set experiences.
     *
     * @param string|null $experiences
     *
     * @return Userdata
     */
    public function setExperiences($experiences = null)
    {
        $this->experiences = $experiences;

        return $this;
    }

    /**
     * Get experiences.
     *
     * @return string|null
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Set motivation.
     *
     * @param string|null $motivation
     *
     * @return Userdata
     */
    public function setMotivation($motivation = null)
    {
        $this->motivation = $motivation;

        return $this;
    }

    /**
     * Get motivation.
     *
     * @return string|null
     */
    public function getMotivation()
    {
        return $this->motivation;
    }

    /**
     * Set anneediplome.
     *
     * @param int|null $anneediplome
     *
     * @return Userdata
     */
    public function setAnneediplome($anneediplome = null)
    {
        $this->anneediplome = $anneediplome;

        return $this;
    }

    /**
     * Get anneediplome.
     *
     * @return int|null
     */
    public function getAnneediplome()
    {
        return $this->anneediplome;
    }

    /**
     * Set anneeexperience1.
     *
     * @param int|null $anneeexperience1
     *
     * @return Userdata
     */
    public function setAnneeexperience1($anneeexperience1 = null)
    {
        $this->anneeexperience1 = $anneeexperience1;

        return $this;
    }

    /**
     * Get anneeexperience1.
     *
     * @return int|null
     */
    public function getAnneeexperience1()
    {
        return $this->anneeexperience1;
    }

    /**
     * Set anneeexperience2.
     *
     * @param int|null $anneeexperience2
     *
     * @return Userdata
     */
    public function setAnneeexperience2($anneeexperience2 = null)
    {
        $this->anneeexperience2 = $anneeexperience2;

        return $this;
    }

    /**
     * Get anneeexperience2.
     *
     * @return int|null
     */
    public function getAnneeexperience2()
    {
        return $this->anneeexperience2;
    }

    /**
     * Set specialite.
     *
     * @param string|null $specialite
     *
     * @return Userdata
     */
    public function setSpecialite($specialite = null)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite.
     *
     * @return string|null
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set etablissementdiplome.
     *
     * @param string|null $etablissementdiplome
     *
     * @return Userdata
     */
    public function setEtablissementdiplome($etablissementdiplome = null)
    {
        $this->etablissementdiplome = $etablissementdiplome;

        return $this;
    }

    /**
     * Get etablissementdiplome.
     *
     * @return string|null
     */
    public function getEtablissementdiplome()
    {
        return $this->etablissementdiplome;
    }

    /**
     * Set departementnaiss.
     *
     * @param \Pgde\EmploiBundle\Entity\Departement|null $departementnaiss
     *
     * @return Userdata
     */
    public function setDepartementnaiss(\Pgde\EmploiBundle\Entity\Departement $departementnaiss = null)
    {
        $this->departementnaiss = $departementnaiss;

        return $this;
    }

    /**
     * Get departementnaiss.
     *
     * @return \Pgde\EmploiBundle\Entity\Departement|null
     */
    public function getDepartementnaiss()
    {
        return $this->departementnaiss;
    }

    /**
     * Set departementresidence.
     *
     * @param \Pgde\EmploiBundle\Entity\Departement|null $departementresidence
     *
     * @return Userdata
     */
    public function setDepartementresidence(\Pgde\EmploiBundle\Entity\Departement $departementresidence = null)
    {
        $this->departementresidence = $departementresidence;

        return $this;
    }

    /**
     * Get departementresidence.
     *
     * @return \Pgde\EmploiBundle\Entity\Departement|null
     */
    public function getDepartementresidence()
    {
        return $this->departementresidence;
    }

    /**
     * Set emploi1.
     *
     * @param \Pgde\EmploiBundle\Entity\Emploi|null $emploi1
     *
     * @return Userdata
     */
    public function setEmploi1(\Pgde\EmploiBundle\Entity\Emploi $emploi1 = null)
    {
        $this->emploi1 = $emploi1;

        return $this;
    }

    /**
     * Get emploi1.
     *
     * @return \Pgde\EmploiBundle\Entity\Emploi|null
     */
    public function getEmploi1()
    {
        return $this->emploi1;
    }

    /**
     * Set emploi2.
     *
     * @param \Pgde\EmploiBundle\Entity\Emploi|null $emploi2
     *
     * @return Userdata
     */
    public function setEmploi2(\Pgde\EmploiBundle\Entity\Emploi $emploi2 = null)
    {
        $this->emploi2 = $emploi2;

        return $this;
    }

    /**
     * Get emploi2.
     *
     * @return \Pgde\EmploiBundle\Entity\Emploi|null
     */
    public function getEmploi2()
    {
        return $this->emploi2;
    }

    /**
     * Set handicap.
     *
     * @param \Pgde\EmploiBundle\Entity\Handicap|null $handicap
     *
     * @return Userdata
     */
    public function setHandicap(\Pgde\EmploiBundle\Entity\Handicap $handicap = null)
    {
        $this->handicap = $handicap;

        return $this;
    }

    /**
     * Get handicap.
     *
     * @return \Pgde\EmploiBundle\Entity\Handicap|null
     */
    public function getHandicap()
    {
        return $this->handicap;
    }

    /**
     * Set academic.
     *
     * @param \Pgde\EmploiBundle\Entity\Academic|null $academic
     *
     * @return Userdata
     */
    public function setAcademic(\Pgde\EmploiBundle\Entity\Academic $academic = null)
    {
        $this->academic = $academic;

        return $this;
    }

    /**
     * Get academic.
     *
     * @return \Pgde\EmploiBundle\Entity\Academic|null
     */
    public function getAcademic()
    {
        return $this->academic;
    }

    /**
     * Set utilisateur.
     *
     * @param \Pgde\EmploiBundle\Entity\Utilisateur $utilisateur
     *
     * @return Userdata
     */
    public function setUtilisateur(\Pgde\EmploiBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur.
     *
     * @return \Pgde\EmploiBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
