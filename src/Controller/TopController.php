<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopController extends Controller
{
    /**
     * @Route("/", name="top")
     * @Template()
     */
    public function index()
    {
        //test
        $dm=$this->get('doctrine_mongodb')->getManager();

        
        return [];
    }
}
