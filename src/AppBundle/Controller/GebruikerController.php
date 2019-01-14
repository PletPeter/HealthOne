<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 09/01/2019
 * Time: 11:02
 */

namespace AppBundle\Controller;

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
        return $this->render('Gebruiker/show.html.lessenlijst.twig', [
            'name' => 'lessenlijst'
        ]);
    }

    /**
     * @Route("/gebruiker/test/geeftestles/{userId}", name="geeftestles")
     */
    public function giveTestLes($userId){
        $entitymanager = $this->getDoctrine()->getManager();
        $les = $entitymanager->getRepository(\AppBundle\Entity\Les::class)->find(1);

        if(!$les){
            throw  $this->createNotFoundException('User does not exist');
        }
        $user = $entitymanager->getRepository(\AppBundle\Entity\User::class)->findOneBy(
            array('id' => 1)
        );

        $les->setUsers($user);
        $entitymanager->flush();
        return $this->redirectToRoute('lessenlijst');
    }
}