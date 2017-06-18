<?php
namespace BileMoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phone
 *
 * @ORM\Table(name="phone")
 * @ORM\Entity(repositoryClass="BileMoBundle\Repository\PhoneRepository")
 */

class Phone
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
	
	/**
	 * @ORM\ManyToMany(targetEntity="BileMoBundle\Entity\Feature")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $feature;


	
	/**
	 * @ORM\ManyToOne(targetEntity="BileMoBundle\Entity\PhoneBrand")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $phoneBrand;
	
	
	/**
	 * @var float
	 *
	 * @ORM\Column(name="price_excl_tax", type="float")
	 */
	private $priceExclTax;
	
	
	/**
	 * @var float
	 *
	 * @ORM\Column(name="price_incl_tax", type="float")
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