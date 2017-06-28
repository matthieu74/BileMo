<?php

namespace AuthBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Nelmio\ApiDocBundle\Annotation as Doc;


class TokenController extends FOSRestController
{
	/**
	 * @Post(
	 *    path = "/login",
	 *    name = "app_tokens_create"
	 * )
	 * 
	 * @View(StatusCode = 201)
	 * * @Doc\ApiDoc(
	 *     section="Authentification",
     *     description="get a jwt token.",
     *     parameters={
	 * 			{"name"="login", "dataType"="text area", "required"=true, "description"="the user's email."},
	 * 			{"name"="password", "dataType"="text area", "required"=true, "description"="the user's password."}
	 *  	},
     *      statusCodes={
     *         201="Returned when created",
     *         400="Returned when a violation is raised by validation"
     *     }
     * )
	 * 
	 */
	public function newTokenAction(Request $request)
	{
		$email = $request->request->get('login');
		$password = $request->request->get('password');
		$user = $this->getDoctrine()
		->getRepository('ClientBundle:User')
		->findOneBy(['email' =>$email]);
		if (!$user) {
			throw $this->createNotFoundException();
		}
		
		$isValid = $this->get('security.password_encoder')
		->isPasswordValid($user, $password);
		
		if (!$isValid) {
			throw new BadCredentialsException();
		}
		
		$token = $this->get('lexik_jwt_authentication.encoder')
		->encode(['email' => $user->getEmail()]);
		
		return new JsonResponse(['token' => $token]);
	}
	
	public function isUserLoggedIn()
	{
		return $this->container->get('security.authorization_checker')
		->isGranted('IS_AUTHENTICATED_FULLY');
	}
	
	/**
	 * Logs this user into the system
	 *
	 * @param User $user
	 */
	public function loginUser(User $user)
	{
		$token = new UsernamePasswordToken($user, $user->getPassword(), 'main', $user->getRoles());
		
		$this->container->get('security.token_storage')->setToken($token);
	}
	
}
