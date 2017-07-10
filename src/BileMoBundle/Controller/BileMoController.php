<?php

namespace BileMoBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation as Doc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BileMoBundle\Entity\Phone;


class BileMoController extends FOSRestController
{
    /**
     * 
     * Get the list of all phones.
     * 
     * @Get(
     *     path = "/phones",
     *     name = "app_phones_index",
     * )
     * @View(serializerGroups={"list"})
     *
     *
     * @Doc\ApiDoc(
     *     section="Phones",
     *     resource=true,
     *     description="Get the list of all phones.",
     *     output= { "class"=Phone::class, "collection"=true, "groups"={"list"} },
     *      statusCodes={
     *         200="Returned when the request is successful",
     *         401 ="Returned when the user does not have the necessary credentials"
     *     }
     * )
     */


    public function indexPhonesAction()
    {
    	return $this->get("bilemo_service")->getAllPhone();
    }

     /**
     * @Get(
     *     path = "/phones/{id}",
     *     name = "app_phones_detail",
     *     requirements = {"id"="\d+"}
     * )
     * @View(serializerGroups={"detail"})
     *
     * @Doc\ApiDoc(
     * 	   section="Phones",
     *     resource=true,
     *     description="Get one phone with detail.",
     *     output= { "class"=Phone::class, "collection"=false, "groups"={"detail"} },
     *     requirements={
     *         {
     *             "name"="id",
     *             "dataType"="integer",
     *             "requirements"="\d+",
     *             "description"="The phone unique identifier."
     *         }
     *     }
     * )
     *
     */
    public function detailPhoneAction($id)
    {
    	return $this->get("bilemo_service")->getDetailPhone($id);
    }
    



}
