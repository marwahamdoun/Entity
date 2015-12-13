<?php
namespace Free\FreelancerBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
/**
 * @ORM\Entity
 * @UniqueEntity("email")
 */
class Jobowner implements UserInterface, \Serializable
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    /**
	 * @ORM\Column(type="string", length=25)
	 */
	private $nom;
	
	/**
	 * @ORM\Column(type="string", length=25)
	 */
	private $prenom;
	/**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;
    /**
     * @ORM\Column(type="string", length=40)
     */
    private $password;
    /**
     * @ORM\Column(type="string", length=40)
     */
    private $confirmepassword;

    /**
     * @ORM\Column(type="integer")
     */
    private $etat;


    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    /**
    * @ORM\OneToMany(targetEntity="Projet", mappedBy="jobowner", cascade={"remove"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $projet;

    public function __construct()
    {
        $this->etat = 1;
        $this->salt = md5(uniqid(null, true));
        $this->roles=array();
    }

    public function __toString()
    {
    return $this->nom;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Jobowner
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Jobowner
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Jobowner
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Jobowner
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set confirmepassword
     *
     * @param string $confirmepassword
     * @return Jobowner
     */
    public function setConfirmepassword($confirmepassword)
    {
        $this->confirmepassword = $confirmepassword;

        return $this;
    }

    /**
     * Get confirmepassword
     *
     * @return string 
     */
    public function getConfirmepassword()
    {
        return $this->confirmepassword;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Jobowner
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set roles
     *
     * @param array $roles
     * @return Jobowner
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Jobowner
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }
     /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }
    public function isEqualTo(UserInterface $user)
    {
        return $this->email === $user->getEmail();
    }
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }
    function getUsername() { 
        return $this->email; 
    }

    /**
     * Add projet
     *
     * @param \Free\FreelancerBundle\Entity\Projet $projet
     * @return Jobowner
     */
    public function addProjet(\Free\FreelancerBundle\Entity\Projet $projet)
    {
        $this->projet[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \Free\FreelancerBundle\Entity\Projet $projet
     */
    public function removeProjet(\Free\FreelancerBundle\Entity\Projet $projet)
    {
        $this->projet->removeElement($projet);
    }

    /**
     * Get projet
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjet()
    {
        return $this->projet;
    }
}
