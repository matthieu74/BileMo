<?php
namespace ClientBundle\Models\Service;

use ClientBundle\Entity\User;
use ClientBundle\Entity\Client;

class ClientService
{
	private $em;
	private $fm;
	public function  __construct($em, $fm)
	{
		$this->em = $em;
		$this->fm = $fm;
	}
	
	public function getAllUsers($idClient)
	{
		return $this->em->getRepository('ClientBundle:User')->findBy(array('client' => $idClient), array('name' => 'ASC'));
	}
	
	public function getUser($id)
	{
		return $this->em->getRepository('ClientBundle:User')->find($id);
	}
	
	public function addUser($user)
	{
		
		$client  = $this->em->getRepository('ClientBundle:Client')->find(1);
		$user->setClient($client);
		
		$this->em->persist($user);
		$this->em->flush();
	}
}