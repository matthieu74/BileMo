<?php
namespace BileMoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * Feature
 *
 * @ORM\Table(name="feature")
 * @ORM\Entity(repositoryClass="BileMoBundle\Repository\FeatureRepository")
 */

class Feature
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"detail", "list"})
	 */
	private $id;
	
	/**
	 * @ORM\ManyToOne(targetEntity="BileMoBundle\Entity\FeatureCategory")
	 * @ORM\JoinColumn(nullable=false)
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"detail"})
	 */
	private $featureCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     * 
     * @Assert\NotBlank(message="Please enter a description")
     * 
     * @Serializer\Since("1.0")
     * @Serializer\Groups({"detail", "list"})
     */
    private $description;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFeatureCategory()
    {
        return $this->featureCategory;
    }

    /**
     * @param mixed $featureCategory
     */
    public function setFeatureCategory($featureCategory)
    {
        $this->featureCategory = $featureCategory;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}