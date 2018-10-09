<?php
/**
 * Created by PhpStorm.
 * User: Krsanika
 * Date: 2018-07-05
 * Time: 오전 6:59
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Document\Scenario;


class ScenarioController extends Controller
{

    /**
     * @Route("scenario", name="scenario_index")
     * @Template()
     */
    public function index()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();

        $allScenario = $dm->getRepository(Scenario::class)->findPublishedOrderedByFavored();

        return ['allScenario' => $allScenario];
    }


    /**
     * @Route("scenario_viewer", name="scenario_viewer")
     * @Template()
     */
    public function viewer(Request $request)
    {
        $idScenario =$request->get('id_scenario');
        $dm = $this->get('doctrine_mongodb')->getManager();

        $scenario = $dm->getRepository(Scenario::class)->findOneBy(["IdScenario"=> $idScenario]);

        return ['scenario' => $scenario];
    }



}