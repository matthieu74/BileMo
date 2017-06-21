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
		return $this->em->getRepository('BileMoBundle:Phone')->findBy(array(), array('name' => 'ASC'));
	}
	
	public function addFeatureCategoy($data)
    {
        $featureCategory = new FeatureCategory();
        $form = $this->fm->create(FeatureCategoryType::class, $featureCategory);
        $form->submit($data);


        $this->em->persist($featureCategory);
        $this->em->flush();
    }
    
    public function getAllFeaturesCategories()
    {
    	return $this->em->getRepository('BileMoBundle:FeatureCategory')->findBy(array(), array('name' => 'ASC'));
    }
    
    public function getDetailPhone($id)
    {
    	$p = $this->em->getRepository('BileMoBundle:Phone')->find($id);
    	return $p;
    }
}