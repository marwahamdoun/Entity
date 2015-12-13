<?php
namespace Free\FreelancerBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Projet
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
     * @ORM\Column(type="integer")
     */
    private $nbfreelancer;

    /**
    * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="projet")
    * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
    */
    private $categorie;
 
    /**
    * @ORM\ManyToOne(targetEntity="Jobowner", inversedBy="projet")
    * @ORM\JoinColumn(name="jobowner_id", referencedColumnName="id")
    */
    private $jobowner;

    /**
     * @ORM\ManyToMany(targetEntity="Freelancer",inversedBy="projet")
     *@ORM\JoinColumn(name="freelancer_id")
     */
    private $freelancer;

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
     * @return Projet
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
     * Set nbfreelancer
     *
     * @param integer $nbfreelancer
     * @return Projet
     */
    public function setNbfreelancer($nbfreelancer)
    {
        $this->nbfreelancer = $nbfreelancer;

        return $this;
    }

    /**
     * Get nbfreelancer
     *
     * @return integer 
     */
    public function getNbfreelancer()
    {
        return $this->nbfreelancer;
    }

    /**
     * Set categorie
     *
     * @param \Free\FreelancerBundle\Entity\Categorie $categorie
     * @return Projet
     */
    public function setCategorie(\Free\FreelancerBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Free\FreelancerBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set jobowner
     *
     * @param \Free\FreelancerBundle\Entity\Jobowner $jobowner
     * @return Projet
     */
    public function setJobowner(\Free\FreelancerBundle\Entity\Jobowner $jobowner = null)
    {
        $this->jobowner = $jobowner;

        return $this;
    }

    /**
     * Get jobowner
     *
     * @return \Free\FreelancerBundle\Entity\Jobowner 
     */
    public function getJobowner()
    {
        return $this->jobowner;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->freelancer = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add freelancer
     *
     * @param \Free\FreelancerBundle\Entity\Freelancer $freelancer
     * @return Projet
     */
    public function addFreelancer(\Free\FreelancerBundle\Entity\Freelancer $freelancer)
    {
        $this->freelancer[] = $freelancer;

        return $this;
    }

    /**
     * Remove freelancer
     *
     * @param \Free\FreelancerBundle\Entity\Freelancer $freelancer
     */
    public function removeFreelancer(\Free\FreelancerBundle\Entity\Freelancer $freelancer)
    {
        $this->freelancer->removeElement($freelancer);
    }

    /**
     * Get freelancer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFreelancer()
    {
        return $this->freelancer;
    }
}
