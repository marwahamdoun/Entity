<?php
namespace Free\FreelancerBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity
 */
class Testaffectation
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
     * @ORM\ManyToMany(targetEntity="Freelancer",inversedBy="testaffectation")
     *@ORM\JoinColumn(name="freelancer_id")
     */
    private $freelancer;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->freelancer = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Testaffectation
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
     * Add freelancer
     *
     * @param \Free\FreelancerBundle\Entity\Freelancer $freelancer
     * @return Testaffectation
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
