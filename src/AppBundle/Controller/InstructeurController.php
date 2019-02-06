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

use AppBundle\Entity\Les;

class InstructeurController extends Controller
{
    /**
     * @Route("/Instructeur/lessenlijst", name="lessenlijstInst")
     */

    public function showLessenlijst()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Les');
        $lessen = $repository->findAll();
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $insLessen = $repository->getLesByInstructor($user);
        $insNLessen = $repository->getLesNotByInstructor($user);

        return $this->render('Instructeur/show.html.lessenlijst.twig', [
            'name' => 'Lessenlijst - Trainingfactory',
            'gebruiker' => $this->getUser(),
            'lessen' => $lessen,
            'inslessen' => $insLessen,
            'insnlessen' => $insNLessen
        ]);
    }

    /**
     * @Route("/Instructeur/lesdetails", name="lesdetails")
     */
    public function showLesDetails()
    {
        $this->redirectToRoute('lessenlijstInst');
    }


}