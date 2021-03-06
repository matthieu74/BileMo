<?php

namespace ClientBundle\Repository;

/**
 * UserRepository
 *FunctionalityRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function findUserByUsername($username)
	{
		return
		$this->createQueryBuilder('u')
		->where('u.username = :username')
		->setParameter('username', $username)
		->getQuery()
		->setHint(Query::HINT_FORCE_PARTIAL_LOAD, true)
		->getOneOrNullResult(Query::HYDRATE_SIMPLEOBJECT);
	}
}
