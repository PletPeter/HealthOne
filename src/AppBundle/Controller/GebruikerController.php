<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 09/01/2019
 * Time: 11:02
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Les;
use AppBundle\Entity\Deelname;

use AppBundle\AppBundle;
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
        $repository = $this->getDoctrine()->getRepository('AppBundle:Deelname');

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $besLessen = $repository->getBeschikbareDeelnames($user->getId());
        $gesLessen = $repository->getIngeschrevenDeelnames($user->getId());

        return $this->render('Gebruiker/show.html.lessenlijst.twig', [
            'name' => 'lessenlijst',
            'gebruiker' => $this->getUser(),
            'besLessen' => $besLessen,
            'gesLessen' => $gesLessen
        ]);
    }

    /**
     * @Route("/gebruiker/lessenlijst/{id}")
     */
    public function SignupAction($id)
    {
        $entitymanager = $this->getDoctrine()->getManager();
        $lesRepo = $this->getDoctrine()->getRepository(Les::class);
        $les = $lesRepo->find($id);
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if( $this->getDoctrine()->getRepository(Deelname::class)->find($les, $user)){

        }
        else {
            $deelname = new Deelname();
            $deelname->setBetaald(false);
            $deelname->setLes($les);
            $deelname->setUser($user);

            $entitymanager->persist($deelname);
            $entitymanager->flush();
        }

        $repository = $this->getDoctrine()->getRepository('AppBundle:Deelname');

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $besLessen = $repository->getBeschikbareDeelnames($user->getId());
        $gesLessen = $repository->getIngeschrevenDeelnames($user->getId());

        $lessen = $lesRepo->findAll();

        return $this->render('Gebruiker/show.html.lessenlijst.twig', [
            'name' => 'lessenlijst',
            'gebruiker' => $this->getUser(),
            'besLessen' => $besLessen,
            'gesLessen' => $gesLessen
        ]);
    }
    /**
     * @Route("/gebruiker/test/geeftestles/{userId}", name="geeftestles")
     */
    public function giveTestLes($userId){
        $entitymanager = $this->getDoctrine()->getManager();
        $les = $entitymanager->getRepository(Les::class)->find(1);

        if(!$les){
            throw  $this->createNotFoundException('User does not exist');
        }
        $user = $entitymanager->getRepository(User::class)->find($userId);

        $les->setUser($user);
        $entitymanager->flush();
        return $this->redirectToRoute('lessenlijst');
    }
}