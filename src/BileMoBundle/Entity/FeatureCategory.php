<?php
namespace BileMoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FeatureCategory
 *
 * @ORM\Table(name="feature_category")
 * @ORM\Entity(repositoryClass="BileMoBundle\Repository\FeatureCategoryRepository")
 */

class FeatureCategory
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
	

}