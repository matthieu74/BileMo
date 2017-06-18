<?php
namespace BileMoBundle\Models\Service;

use BileMoBundle\Entity\FeatureCategory;
use BileMoBundle\Form\FeatureCategoryType;

class BileMoService
{
	private $em;
	private $fm;
	public function  __construct($em, $fm)
	{
		$this->em = $em;
		$this->fm = $fm;
	}
	
	
	public function getAllPhone()
	{
		return $this->em ->getRepository('BileMoBundle:Phone')->findBy(array(), array('name' => 'ASC'));
	}
	
	
	public function addUser($user)
	{
		$this->em= $this->getDoctrine()->getManager();
		
		$this->em->persist($user);
		$this->em->flush();
	}

	public function addFeatureCategoy($data)
    {
        $featureCategory = new FeatureCategory();
        $form = $this->fm->create(FeatureCategoryType::class, $featureCategory);
        $form->submit($data);


        $this->em->persist($featureCategory);
        $this->em->flush();
    }
}