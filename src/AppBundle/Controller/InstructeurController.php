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
        $repository = $this->getDoctrine()->getRepository('AppBundle:les');
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
    public function showLesRedirect()
    {
        return $this->redirectToRoute('lessenlijstInst');
    }
    /**
     * @Route("/Instructeur/lesdetails/{id}")
     */
    public function showLesDetails($id)
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $rep = $this->getDoctrine()->getRepository('AppBundle:Les');
        $les = $rep->find($id);

        return $this->render('Instructeur/show.html.lesdetails.twig', [
           'name' => 'Lesdetails - Trainingfactory',
           'gebruiker' => $this->getUser(),
           'les' => $les
        ]);
    }


}