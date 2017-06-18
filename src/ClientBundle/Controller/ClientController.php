<?php

namespace ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ClientController extends Controller
{
    /**
     * @Rest\Get("/users")
     */
    public function indexUserAction()
    {
        $tmp = $this->get("bilemo_service")->getAllPhone();
        echo var_dump($tmp);
        return $this->render('BileMoBundle:Default:index.html.twig');
    }

    /**
     * @Rest\Get("/users/{id}")
     */
    public function detailUserAction($id)
    {
        $tmp = $this->get("bilemo_service")->getAllPhone();
        echo var_dump($tmp);
        return $this->render('BileMoBundle:Default:index.html.twig');
    }

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
        $this->get("bilemo_service")->getAllPhone();

        return $user;
    }
}
