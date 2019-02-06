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

class InstructeurController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */

    public function showAdmin()
    {
        return $this->render('HealthOne/show.html.contact.twig', [
            'name' => 'Contact - HealthOne'
        ]);
    }


}