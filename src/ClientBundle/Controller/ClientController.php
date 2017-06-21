<?php

namespace ClientBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
	 */
	public function addUserAction(User $user)
	{
		return $this->get('client_service')->addUser($user);
	}
	
	/**
	 * @Get(
	 *     path = "/users",
	 *     name = "app_users_index",
	 * )
	 * @View
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
     * @View
     */
    public function detailUserAction($id)
    {
    	return $this->get('client_service')->getUser($id);
    }

   
}
