<?php

namespace BileMoBundle\Controller;

use BileMoBundle\Entity\Feature;
use BileMoBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
     * @Post(
     *    path = "/features/Categories",
     *    name = "app_feature_create"
     * )
     * @Rest\View(StatusCode = 201)
     */
    public function createFeatureCategoryAction($request)
    {
        $data = $this->get('jms_serializer')->deserialize($request->getContent(), 'array', 'json');

        return $this->get("bilemo_service")->addFeatureCategoy($data);
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
    	$tmp = $this->get("bilemo_service")->getAllPhone();
    	echo var_dump($id);
    	return $this->render('BileMoBundle:Default:index.html.twig');
    }
    



}
