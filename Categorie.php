<?php
namespace Free\FreelancerBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Categorie
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
    * @ORM\OneToMany(targetEntity="Souscategorie", mappedBy="categorie", cascade={"remove"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $souscategorie;

    /**
    * @ORM\OneToMany(targetEntity="Projet", mappedBy="categorie", cascade={"remove"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $projet;

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
     * @return Categorie
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
     * Set souscategorie
     *
     * @param \Free\FreelancerBundle\Entity\Souscategorie $souscategorie
     * @return Categorie
     */
    public function setSouscategorie(\Free\FreelancerBundle\Entity\Souscategorie $souscategorie)
    {
        $this->souscategorie = $souscategorie;

        return $this;
    }

    /**
     * Get souscategorie
     *
     * @return \Free\FreelancerBundle\Entity\Souscategorie 
     */
    public function getSouscategorie()
    {
        return $this->souscategorie;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->souscategorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add souscategorie
     *
     * @param \Free\FreelancerBundle\Entity\Souscategorie $souscategorie
     * @return Categorie
     */
    public function addSouscategorie(\Free\FreelancerBundle\Entity\Souscategorie $souscategorie)
    {
        $this->souscategorie[] = $souscategorie;

        return $this;
    }

    /**
     * Remove souscategorie
     *
     * @param \Free\FreelancerBundle\Entity\Souscategorie $souscategorie
     */
    public function removeSouscategorie(\Free\FreelancerBundle\Entity\Souscategorie $souscategorie)
    {
        $this->souscategorie->removeElement($souscategorie);
    }

    /**
     * Add projet
     *
     * @param \Free\FreelancerBundle\Entity\Projet $projet
     * @return Categorie
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
