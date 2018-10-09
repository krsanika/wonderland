<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WonderlandUserController extends Controller
{
    /**
     * @Route("/wonderland/user", name="wonderland_user_index")
     */
    public function index()
    {
        return $this->render('wonderland_user_brochure/index.html.twig', [
            'controller_name' => 'WonderlandUserBrochureController',
        ]);
    }


}
