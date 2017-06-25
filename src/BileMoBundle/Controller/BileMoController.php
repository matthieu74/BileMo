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

class BileMoController extends FOSRestController
{
    /**
     * @Get(
     *     path = "/phones",
     *     name = "app_phones_index",
     * )
     * @View(serializerGroups={"list"})
     */
    public function indexPhonesAction()
    {
    	return $this->get("bilemo_service")->getAllPhone();
    }

  
    /**
     * @Post("/features/Categories")
     * @View(StatusCode = 201)
     * @ParamConverter("featureCat", converter="fos_rest.request_body")
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
     */
    public function detailPhoneAction($id)
    {
    	return $this->get("bilemo_service")->getDetailPhone($id);
    }
    



}
