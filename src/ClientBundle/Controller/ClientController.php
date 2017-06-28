<?php

namespace ClientBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Nelmio\ApiDocBundle\Annotation as Doc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ClientBundle\Entity\User;
use ClientBundle\Entity\Client;



class ClientController extends FOSRestController
{
	
	/**
	 * Create a user
	 * 
	 * @Post(
	 *    path = "/users",
	 *    name = "app_user_create"
	 * )
	 * @View(StatusCode = 201)
	 * @ParamConverter("user", converter="fos_rest.request_body")
     *
     * @Doc\ApiDoc(
     * 		section="Users",
     * 		resource = true,
     *     description="Create a user.",
     *     input={ "class"=User::class, "collection"=false, "groups"={"edit"} },     
     *     
     *      statusCodes={
     *         201="Returned when created",
     *         400="Returned when a violation is raised by validation"
     *     }
     * )
     *
	 */
	public function addUserAction(User $user)
	{
		$user = $this->container->get('security.token_storage')->getToken()->getUser();
		
		
		$encoder = $this->get('security.password_encoder');
		return $this->get('client_service')->addUser($user, $encoder, $user);
	}
	
	
	/**
	 * Get the list of all users form a client.
	 * 
	 * @Get(
	 *     path = "/users",
	 *     name = "app_users_index",
	 * )
	 * @View(serializerGroups={"list"})
     *
     * @Doc\ApiDoc(
     * 		section="Users",
     *		 resource=true,
     *     description="Get the list of all users form a client.",
     *     output= { "class"=User::class, "collection"=true, "groups"={"list"} },
     *      statusCodes={
     *         200="Returned when the request is successful",
     *         401 ="Returned when the user does not have the necessary credentials"
     *     }
     * )
     *
	 */
    public function indexUserAction()
    {
    	
    	$user = $this->container->get('security.token_storage')->getToken()->getUser();
    	
        return $this->get('client_service')->getAllUsers($user);
    }

    /**
    * @Get(
    *     path = "/users/{id}",
    *     name = "app_user_detail",
    *     requirements = {"id"="\d+"}
    * )
    * @View(serializerGroups={"detail"})
    *
    * @Doc\ApiDoc(
    *  section="Users",
    *     resource=true,
    *     description="Get one usert with detail.",
    *     output= { "class"=User::class, "collection"=false, "groups"={"detail"} },
    *     requirements={
    *         {
    *             "name"="id",
    *             "dataType"="integer",
    *             "requirements"="\d+",
    *             "description"="The user unique identifier."
    *         }
    *     }
    * )
    *
    */
    public function detailUserAction($id)
    {
    	return $this->get('client_service')->getUser($id);
    }

   
}
