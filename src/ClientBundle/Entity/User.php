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
	 * the user's id
	 * 
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
	 * the user's name
	 * 
	 * @var string
	 *
	 * @ORM\Column(name="username", type="string", length=255)
	 * 
	 * @Assert\NotBlank(message="Please enter a username")
	 * 
	 * @Serializer\Since("1.0")
	 * @Serializer\Groups({"list", "detail", "edit"})
	 * 
	 */
	private $username;

    /**
     * The user's mail
     * 
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255,  unique=true)
     * 
     * @Assert\NotBlank(message="Please enter a email")
     * 
   	 * @Serializer\Since("1.0")
     * @Serializer\Groups({"detail", "edit"})
     */
    private $email;
    
    /**
     * 
     * The user's password
     * @ORM\Column(type="string")
     * 
     *  @Assert\NotBlank(message="Please enter a password")
     * 
     *  @Serializer\Groups({"edit"})
     */
    protected $password;
    
    protected $plainPassword;
	
	/**
	 * The user's company
	 * 
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $mail
     */
    public function setEmail($mail)
    {
        $this->email = $mail;
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
    	$this->plainPassword = null;
    }


}