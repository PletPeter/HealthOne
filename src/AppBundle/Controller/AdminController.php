<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 09/01/2019
 * Time: 11:03
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends Controller
{
    /**
     * @Route("/Admin/ledenlijst", name="ledenlijst")
     */

    public function showLessenlijst()
    {
        return $this->render(':Admin:show.html.ledenlijst.twig', [
            'name' => 'Ledenlijst - TrainingFactory'
        ]);
    }


}