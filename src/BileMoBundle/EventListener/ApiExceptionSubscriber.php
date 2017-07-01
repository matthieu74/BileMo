<?php

namespace BileMoBundle\EventListener;

use BileMoBundle\Api\ApiProblem;
use BileMoBundle\Api\ApiProblemException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ApiExceptionSubscriber implements EventSubscriberInterface
{
	public function onKernelException(GetResponseForExceptionEvent $event)
	{
		$e = $event->getException();
		
		if ($e instanceof ApiProblemException) {
			$apiProblem = $e->getApiProblem();
		} else {
		    if ($e instanceof HttpExceptionInterface)
			    $statusCode =  $e->getStatusCode();
		    else if ($e instanceof BadCredentialsException)
                return $e;
		    else if ($e instanceof CustomUserMessageAuthenticationException)
		        return $e;
		    else
                $statusCode = 500;

			$apiProblem = new ApiProblem(
					$statusCode
					);


			if ($e instanceof HttpExceptionInterface) {
                $apiProblem->set('detail', $e->getMessage());
            }
            else if ($e instanceof \Exception) {
                $apiProblem->set('detail', $e->getMessage());
            }

		}
		
		$response = new JsonResponse(
				$apiProblem->toArray(),
				$apiProblem->getStatusCode()
				);
		$response->headers->set('Content-Type', 'application/problem+json');
		
		$event->setResponse($response);
	}
	
	public static function getSubscribedEvents()
	{
		return array(
				KernelEvents::EXCEPTION => 'onKernelException'
		);
	}
}
