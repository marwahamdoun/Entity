<?php
namespace Free\FreelancerBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="Free\FreelancerBundle\Entity\SouscategorieRepository")
 * @ORM\Table(name="Souscategorie")
 * @UniqueEntity("email")
 */
class Souscategorie
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
    * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="souscategorie")
    * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
    */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="Freelancer",inversedBy="souscategorie")
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
     * @return Souscategorie
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
     * Set categorie
     *
     * @param \Free\FreelancerBundle\Entity\Categorie $categorie
     * @return Souscategorie
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
     * @return Souscategorie
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
