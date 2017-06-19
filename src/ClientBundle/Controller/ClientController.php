<?php

namespace ClientBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientController extends Controller
{
	/**
	 * @Get(
	 *     path = "/",
	 *     name = "app_users_index",
	 * )
	 * @View
	 */
    public function indexUserAction()
    {
       
        return $this->render('ClientBundle:Default:index.html.twig');
    }

    /**
     * @Get("/users/{id}")
     */
    public function detailUserAction($id)
    {
       
        return $this->render('ClientBundle:Default:index.html.twig');
    }

    /**
     * @Post(
     *    path = "/",
     *    name = "app_user_create"
     * )
     * @View(StatusCode = 201)
     * @ParamConverter("user", converter="fos_rest.request_body")
     */
    public function addUserAction(User $user)
    {
   
        return $user;
    }
}
