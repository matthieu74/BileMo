<?php
namespace BileMoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Phone
 *
 * @ORM\Entity(repositoryClass="BileMoBundle\Repository\PhoneRepository")
 * @ORM\Table(name="phone")
 *
 * 
 * @Hateoas\Relation(
 *      "self",
 *      href = @Hateoas\Route(
 *          "app_phones_detail",
 *          parameters = { "id" = "expr(object.getId())" },
 *          absolute = true
 *      ),
 *       exclusion = @Hateoas\Exclusion(groups={"detail", "list"})
 * )
 *
 */
class Phone
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
	 * 
	 */
	private $id;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 * 
	 * @Assert\NotBlank
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"detail", "list"})
	 * 
	 */
	private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * 
     * @Assert\NotBlank
     * 
     * @Serializer\Since("1.0")
     * @Serializer\Groups({"detail"})
     * 
     */
    private $description;
	
	/**
	 * @ORM\ManyToMany(targetEntity="BileMoBundle\Entity\Feature")
	 * @ORM\JoinColumn(nullable=false)
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"detail"})
	 */
	private $feature;


	
	/**
	 * @ORM\ManyToOne(targetEntity="BileMoBundle\Entity\PhoneBrand")
	 * @ORM\JoinColumn(nullable=false)
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"detail", "list"})
	 * 
	 */
	private $phoneBrand;
	
	
	/**
	 * @var float
	 *
	 * @ORM\Column(name="price_excl_tax", type="float")
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"detail"})
	 * 
	 */
	private $priceExclTax;
	
	
	/**
	 * @var float
	 *
	 * @ORM\Column(name="price_incl_tax", type="float")
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"detail"})
	 * 
	 */
	private $priceInclTax;

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
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * @param mixed $feature
     */
    public function setFeature($feature)
    {
        $this->feature = $feature;
    }

    /**
     * @return mixed
     */
    public function getPhoneBrand()
    {
        return $this->phoneBrand;
    }

    /**
     * @param mixed $phoneBrand
     */
    public function setPhoneBrand($phoneBrand)
    {
        $this->phoneBrand = $phoneBrand;
    }

    /**
     * @return float
     */
    public function getPriceExclTax()
    {
        return $this->priceExclTax;
    }

    /**
     * @param float $priceExclTax
     */
    public function setPriceExclTax($priceExclTax)
    {
        $this->priceExclTax = $priceExclTax;
    }

    /**
     * @return float
     */
    public function getPriceInclTax()
    {
        return $this->priceInclTax;
    }

    /**
     * @param float $priceInclTax
     */
    public function setPriceInclTax($priceInclTax)
    {
        $this->priceInclTax = $priceInclTax;
    }
	
	

}