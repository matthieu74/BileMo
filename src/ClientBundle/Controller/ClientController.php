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



class ClientController extends Controller
{
	
	/**
	 * @Post(
	 *    path = "/users",
	 *    name = "app_user_create"
	 * )
	 * @View(StatusCode = 201)
	 * @ParamConverter("user", converter="fos_rest.request_body")
     *
     * @Doc\ApiDoc(
     *     resource=true,
     *     description="Create a user.",
     *     input = {
     *         "class" = "ClientBundle\Form\UserType"
     *     },
     *      statusCodes={
     *         201="Returned when created",
     *         400="Returned when a violation is raised by validation"
     *     }
     * )
     *
	 */
	public function addUserAction(User $user)
	{
		$encoder = $this->get('security.password_encoder');
		return $this->get('client_service')->addUser($user, $encoder);
	}
	
	
	/**
	 * @Get(
	 *     path = "/users",
	 *     name = "app_users_index",
	 * )
	 * @View(serializerGroups={"list"})
     *
     * @Doc\ApiDoc(
     *     resource=true,
     *     description="Get the list of all users form a client."
     * )
     *
	 */
    public function indexUserAction()
    {
    	$idClient = 1;
        return $this->get('client_service')->getAllUsers($idClient);
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
    *     resource=true,
    *     description="Get one usert with detail.",
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
