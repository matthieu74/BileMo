<?php

namespace AuthBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;


class TokenController extends FOSRestController
{
	/**
	 * @Route("/tokens")
	 * @Method("POST")
	 */
	public function newTokenAction(Request $request)
	{
		$username = $request->request->get('username');
		$password = $request->request->get('password');
		$user = $this->getDoctrine()
		->getRepository('ClientBundle:User')
		->findOneBy(['username' =>$username]);
	
		if (!$user) {
			throw $this->createNotFoundException();
		}
		
		$isValid = $this->get('security.password_encoder')
		->isPasswordValid($user, $password);
		
		if (!$isValid) {
			throw new BadCredentialsException();
		}
		
		$token = $this->get('lexik_jwt_authentication.encoder')
		->encode(['username' => $user->getUsername()]);
		
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
	
	
	
	/**
	 * Used to find the fixtures user - I use it to cheat in the beginning
	 *
	 * @param $username
	 * @return User
	 */
	public function findUserByUsername($username)
	{
		return $this->getUserRepository()->findUserByUsername($username);
	}
	
	/**
	 * @return UserRepository
	 */
	protected function getUserRepository()
	{
		return $this->getDoctrine()
		->getRepository('ClientBundle:User');
	}
}
