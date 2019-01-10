<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 09/01/2019
 * Time: 11:02
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class GebruikerController extends Controller
{
    /**
     * @Route("/gebruiker/lessenlijst", name="lessenlijst")
     */
    public function listAction()
    {
        return $this->render('Gebruiker/show.html.lessenlijst.twig', [
            'name' => 'lessenlijst - HealthOne'
        ]);
    }
}