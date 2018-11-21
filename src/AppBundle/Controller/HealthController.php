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
        $em = $this->getDoctrine()->getManager();
        $artsen = $em->getRepository('AppBundle\Entity\Artsen')
            ->findAll();
        return $this->render('HealthOne/show.html.artsenlijst.twig', [
            'artsen' => $artsen,
            'name' => 'Artsenlijst - HealthOne'
        ]);
    }
    /**
     * @Route("/medicijnenlijst", name="medicijnenlijst")
     */
    public function showMedicijnenlijst()
    {
        $em = $this->getDoctrine()->getManager();
        $patienten = $em->getRepository('AppBundle\Entity\Medicijnen')
            ->findAll();
        return $this->render('HealthOne/show.html.medicijnenlijst.twig', [
            'medicijnen' => $patienten,
            'name' => 'Medicijnenlijst - HealthOne'
        ]);
    }

    /**
     * @Route("/testformulier", name="testformulier")
     */
    public function showTestformulier()
    {
        return $this->render('HealthOne/show.html.testformulier.twig', [
            'name' => 'Testformulier - HealthOne'
        ]);
    }


}