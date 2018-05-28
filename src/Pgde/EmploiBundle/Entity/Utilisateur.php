<?php

namespace Pgde\EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="Pgde\EmploiBundle\Repository\UtilisateurRepository")
 * * @UniqueEntity(
 *     fields={"numberid"},
 *     message="Ce numéro de carte d'identité est déjà utilisé."
 * )
 *
 * @ORM\AttributeOverrides({
 *     @ORM\AttributeOverride(name="salt", column=@ORM\Column(nullable=true))
 * })
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Merci de renseigner votre prenom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Merci de renseigner votre nom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     *
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     *
     * @Assert\NotBlank(message="Merci de renseigner votre Numero de carte d'identité.", groups={"Registration", "Profile"})
     */
    protected $numberid;

    /**
     * @ORM\OneToOne(targetEntity="Pgde\EmploiBundle\Entity\Userdata", cascade={"persist"}, mappedBy="utilisateur")
     */
    private $userdata;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname.
     *
     * @param string $firstname
     *
     * @return Utilisateur
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname.
     *
     * @param string $lastname
     *
     * @return Utilisateur
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set numberid.
     *
     * @param int $numberid
     *
     * @return Utilisateur
     */
    public function setNumberid($numberid)
    {
        $this->numberid = $numberid;

        return $this;
    }

    /**
     * Get numberid.
     *
     * @return int
     */
    public function getNumberid()
    {
        return $this->numberid;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime('now');
    }


    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->createdAt = new \DateTime('now');
    }

    /**
     * Set userdata.
     *
     * @param \Pgde\EmploiBundle\Entity\Userdata|null $userdata
     *
     * @return Utilisateur
     */
    public function setUserdata(\Pgde\EmploiBundle\Entity\Userdata $userdata = null)
    {
        $this->userdata = $userdata;

        return $this;
    }

    /**
     * Get userdata.
     *
     * @return \Pgde\EmploiBundle\Entity\Userdata|null
     */
    public function getUserdata()
    {
        return $this->userdata;
    }

}
