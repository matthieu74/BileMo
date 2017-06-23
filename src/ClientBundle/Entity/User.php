<?php
namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="ClientBundle\Repository\UserRepository")
 * 
 *  @Hateoas\Relation(
 *      "self",
 *      href = @Hateoas\Route(
 *          "app_user_detail",
 *          parameters = { "id" = "expr(object.getId())" },
 *          absolute = true
 *      ),
 *       exclusion = @Hateoas\Exclusion(groups={"detail", "list"})
 * )
 * 
 * 
 */

class User
{
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"list", "detail"})
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
	 * @Serializer\Groups({"list", "detail"})
	 * 
	 */
	private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     * 
     * @Serializer\Since("2.0")
     * @Serializer\Groups({"detail"})
     */
    private $mail;
	
	/**
	 * @ORM\ManyToOne(targetEntity="ClientBundle\Entity\Client")
	 * @ORM\JoinColumn(nullable=false)
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"detail"})
	 */
	private $client;

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
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }


}