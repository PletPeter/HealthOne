<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 09/01/2019
 * Time: 11:03
 */

namespace AppBundle\Controller;

use AppBundle\Form\LesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\Les;

class InstructeurController extends Controller
{
    /**
     * @Route("/instructeur/lessenlijst", name="lessenlijstInst")
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
     * @Route("/instructeur/lesdetails", name="lesdetails")
     */
    public function showLesRedirect()
    {
        return $this->redirectToRoute('lessenlijstInst');
    }
    /**
     * @Route("/instructeur/lesdetails/{id}")
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
    /**
     * @Route("/instructeur/lesedit", name="lesedit")
     */
    public function showLesEditRedirect()
    {
        return $this->redirectToRoute('lessenlijstInst');
    }
    /**
     * @Route("/instructeur/lesedit/{id}")
     */
    public function editLesDetails(Request $request, $id){
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $rep = $this->getDoctrine()->getRepository('AppBundle:Les');
        $les = $rep->find($id);

        $form = $this->createForm(LesType::class, $les);
        //        $form->add('save', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 2.5) Is the user new, gebruikersnaam moet uniek zijn
            $em = $this->getDoctrine()->getManager();
            $em->persist($les);
            $em->flush();
            return $this->redirectToRoute('lessenlijstInst');
        }

        return $this->render('Instructeur/show.html.form.twig', [
            'gebruiker' => $this->getUser(),
            'form'=>$form->createView()
        ]);
    }
        /**
         * @Route("/instructeur/lesdelete/{id}", name="lesdelete")
         */
        public function deleteLes($id){
            $rep = $this->getDoctrine()->getRepository('AppBundle:Les');
            $les = $rep->find($id);

            $em = $this->getDoctrine()->getManager();
            $em->remove($les);
            $em->flush();

            return $this->redirectToRoute('lessenlijstInst');

        }



}