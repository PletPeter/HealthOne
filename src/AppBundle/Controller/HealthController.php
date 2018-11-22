<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 07/11/2018
 * Time: 12:27
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Medicijnen;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/Medicijnform", name="Medicijnform")
     */
    public function newAction(Request $request)
    {
        $form=$this->createForm(FormMaker::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $afdeling = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $em->persist($afdeling);

            $em->flush();
            $this->addFlash('success', 'Medicijn created!');
            return $this->redirectToRoute('medicijnenlijst');
        }

        return $this->render('HealthOne/new.html.twig', [
            'afdelingForm'=>$form->createView()
        ]);
    }

    /**
     * @Route("/delete/{ID}", name="medicijnendelete")
     */
    public function deleteMedicijn($ID)
    {
        $product = $this->getDoctrine()
            ->getRepository(Medicijnen::class)
            ->find($ID);

        if (!$product) {
            throw $this->createNotFoundException(
                'No medicijn found for id ' . $ID
            );
        }
        $em = $this->getDoctrine()->getManager();
        $patienten = $em->getRepository('AppBundle\Entity\Medicijnen')
            ->findAll();
        return $this->render('HealthOne/show.html.medicijnenlijst.twig', [
            'medicijnen' => $patienten,
            'name' => 'Medicijnenlijst - HealthOne'
        ]);
    }


}