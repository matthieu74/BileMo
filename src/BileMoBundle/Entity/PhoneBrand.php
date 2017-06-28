<?php
namespace BileMoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;
/**
 * PhoneBrand
 *
 * @ORM\Table(name="phone_brand")
 * @ORM\Entity(repositoryClass="BileMoBundle\Repository\PhoneBrandRepository")
 */

class PhoneBrand
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
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 * 
	 * @Assert\NotBlank(message="Please enter a name")
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"detail", "list"})
	 */
	private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     * 
     * @Assert\NotBlank(message="Please enter a country")
     * 
     * @Serializer\Since("1.0")
     * @Serializer\Groups({"detail", "list"})
     * 
     */
    private $country;

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

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

	
	
}