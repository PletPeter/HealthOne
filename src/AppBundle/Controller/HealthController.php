<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 07/11/2018
 * Time: 12:27
 */

namespace AppBundle\Controller;


use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HealthController extends Controller
{
    /**
 * @Route("/", name="index")
 */
    public function showIndex()
    {
        $logger=$this->get('monolog.logger.Nederland');
        $logger->info("DE DUITSERS KOMEN");

        return $this->render('base.html.twig', [
            'name' => 'Homepagina - HealthOne'
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function showContact()
    {
        return $this->render('HealthOne/show.html.contact.twig', [
            'name' => 'Contact - HealthOne'
        ]);
    }

    /**
     * @Route("/login", name="login")
     */

    public function showLogin(Request $request,AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();

        $lastUsername = $authUtils->getLastUsername();


        return $this->render('HealthOne/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */

    public function showAdmin()
    {
        return $this->render('HealthOne/show.html.contact.twig', [
            'name' => 'Contact - HealthOne'
        ]);
    }


    /**
     * @Route("/Lessenlijst", name="lessenlijst")
     */
    public function listAction()
    {
        return $this->render('HealthOne/show.html.lessenlijst.twig', [
            'name' => 'lessenlijst - HealthOne'
        ]);
    }

}