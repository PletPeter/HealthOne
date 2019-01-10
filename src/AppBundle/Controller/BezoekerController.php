<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 07/11/2018
 * Time: 12:27
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class BezoekerController extends Controller
{
    /**
    * @Route("/", name="index")
    */
    public function showIndex()
    {
        $logger=$this->get('monolog.logger.Nederland');
        $logger->info("DE DUITSERS KOMEN");

        return $this->render('index.html.twig', [
            'name' => 'Homepagina - Trainingfactory'
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function showContact()
    {
        return $this->render('show.html.contact.twig', [
            'name' => 'Contact - Trainingfactory'
        ]);
    }

    /**
     * @Route("/login", name="login")
     */

    public function showLogin(Request $request,AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();

        $lastUsername = $authUtils->getLastUsername();


        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }


}