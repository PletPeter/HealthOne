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
        $repository = $this->getDoctrine()->getRepository(Les::class);

        $lessen = $repository->findAll();
        $deelnames = $repository->find();

        return $this->render('Gebruiker/show.html.lessenlijst.twig', [
            'name' => 'lessenlijst',
            'gebruiker' => $this->getUser(),
            'lessen' => $lessen
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
        $userID = $this->getUser();
        if( $this->getDoctrine()->getRepository(Deelname::class)->find($les, $userID)){

        }
        else {
            $deelname = new Deelname();
            $deelname->setBetaald(false);
            $deelname->setLes($les);
            $deelname->setUser($userID);

            $entitymanager->persist($deelname);
            $entitymanager->flush();
        }

        $lessen = $lesRepo->findAll();

        return $this->render('Gebruiker/show.html.lessenlijst.twig', [
            'name' => 'lessenlijst',
            'gebruiker' => $this->getUser(),
            'lessen' => $lessen
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