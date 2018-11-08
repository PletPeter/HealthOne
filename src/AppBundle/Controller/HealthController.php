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
use Symfony\Component\HttpFoundation\Response;

class HealthController extends Controller
{
    /**
 * @Route("/", name="index")
 */
    public function showIndex()
    {
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
     * @Route("/patientenlijst", name="patientenlijst")
     */
    public function showPatientlijst()
    {
        return $this->render('HealthOne/show.html.patientenlijst.twig', [
            'name' => 'Patientenlijst - HealthOne'
        ]);
    }
}