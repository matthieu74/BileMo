<?php

namespace BileMoBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BileMoController extends Controller
{
    /**
     * @Get(
     *     path = "/phones",
     *     name = "app_phones_index",
     * )
     * @View
     */
    public function indexPhonesAction()
    {
    	return $this->get("bilemo_service")->getAllPhone();
    }



    /**
     * @Get(
     *     path = "/features/Categories",
     *     name = "app_features_categories_index",
     * )
     * @View
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
     * @View
     */
    public function detailPhoneAction($id)
    {
    	return $this->get("bilemo_service")->getDetailPhone($id);
    }
    



}
