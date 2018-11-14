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
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $patienten = $em->getRepository('AppBundle\Entity\Patienten')
            ->findAll();
        return $this->render('HealthOne/show.html.patientenlijst.twig', [
            'patienten' => $patienten,
            'name' => 'Patientenlijst - HealthOne'
        ]);
    }
    /**
     * @Route("/artsenlijst", name="artsenlijst")
     */
    public function showArtsenlijst()
    {
        return $this->render('HealthOne/show.html.artsenlijst.twig', [
            'name' => 'Artsenlijst - HealthOne'
        ]);
    }
    /**
     * @Route("/medicijnenlijst", name="medicijnenlijst")
     */
    public function showMedicijnenlijst()
    {
        return $this->render('HealthOne/show.html.medicijnenlijst.twig', [
            'name' => 'Medicijnenlijst - HealthOne'
        ]);
    }


}