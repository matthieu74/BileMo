<?php
namespace ClientBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
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

class User implements UserInterface
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
	 * @ORM\Column(name="username", type="string", length=255)
	 * 
	 * @Assert\NotBlank
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"list", "detail"})
	 * 
	 */
	private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * 
     * @Serializer\Since("2.0")
     * @Serializer\Groups({"detail"})
     */
    private $email;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $password;
    
    protected $plainPassword;
	
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $name
     */
    public function setUsername($username)
    {
    	$this->username= $username;
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
    
    
    public function getPassword()
    {
    	return $this->password;
    }
    
    public function setPassword($password)
    {
    	$this->password = $password;
    }
    
    
    public function getRoles()
    {
    	return [];
    }
    
    public function getSalt()
    {
    	return null;
    }
    
   
    
    public function eraseCredentials()
    {
    	// Suppression des données sensibles
    	$this->plainPassword = null;
    }


}