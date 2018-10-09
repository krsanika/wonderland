<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WonderlandUserBrochureController extends Controller
{
    /**
     * @Route("/wonderland/user/brochure", name="wonderland_user_brochure")
     */
    public function index()
    {
        return $this->render('wonderland_user_brochure/index.html.twig', [
            'controller_name' => 'WonderlandUserBrochureController',
        ]);
    }
}
