<?php

namespace Free\FreelancerBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;

class SouscategorieRepository extends EntityRepository {
	public function getListe($nom) {
		$em = $this->getEntityManager ();
		$FreeQuery = $em->createQueryBuilder ()
					   ->select ( 'c' )
					   ->from ( 'FreeFreelancerBundle:Souscategorie', 'c' )
					   ->andWhere ( "c.nom LIKE :nom" )
					   ->setParameter ( 'nom', '%' . $nom . '%' )
					   ->getQuery()
					   ->getArrayResult();
		
		return $FreeQuery;
		}
				
}