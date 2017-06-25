<?php

namespace BileMoBundle\Controller;

use BileMoBundle\Entity\FeatureCategory;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationList;
use Nelmio\ApiDocBundle\Annotation as Doc;


/**
 * @Security("is_granted('ROLE_USER')")
 */
class BileMoController extends FOSRestController
{
    /**
     * @Get(
     *     path = "/phones",
     *     name = "app_phones_index",
     * )
     * @View(serializerGroups={"list"})
     *
     *
     * @Doc\ApiDoc(
     *     resource=true,
     *     description="Get the list of all phones."
     * )
     */

*/
    public function indexPhonesAction()
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
    	return $this->get("bilemo_service")->getAllPhone();
    }

  
    /**
     * @Post("/features/Categories")
     * @View(StatusCode = 201)
     * @ParamConverter("featureCat", converter="fos_rest.request_body")
     *
     * @Doc\ApiDoc(
     *     resource=true,
     *     description="Create a category of feature."
     *      statusCodes={
     *         201="Returned when created",
     *         400="Returned when a violation is raised by validation"
     *     }
     * )
     */
    public function createFeatureCategoryAction(FeatureCategory $featureCat, ConstraintViolationList $violations)
    {
        
    	if (count($violations)) {
    		return $this->view($violations, Response::HTTP_BAD_REQUEST);
    	}
    	
    	return $this->get("bilemo_service")->addFeatureCategoy($featureCat);
    }

    /**
     * @Get(
     *     path = "/features/Categories",
     *     name = "app_features_categories_index",
     * )
     * @View(serializerGroups={"detail"})
     */
    public function indexFeaturesCategoriesAction()
    {
        return $this->get("bilemo_service")->getAllFeaturesCategories();
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
     *     resource=true,
     *     description="Get one phone with detail.",
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
