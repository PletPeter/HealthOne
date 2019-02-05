<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 07/11/2018
 * Time: 12:27
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class BezoekerController extends Controller
{
    /**
    * @Route("/", name="index")
    */
    public function showIndex()
    {
        $logger=$this->get('monolog.logger.Nederland');
        $logger->info("DE DUITSERS KOMEN");

        return $this->render('index.html.twig', [
            'name' => 'Homepagina - Trainingfactory'
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function showContact()
    {
        return $this->render('show.html.contact.twig', [
            'name' => 'Contact - Trainingfactory'
        ]);
    }
    /**
     * @Route("/gedragsregels", name="gedragsregels")
     */
    public function showGedragsregels()
    {
        return $this->render('show.html.gedragsregels.twig', [
            'name' => 'Gedragsregels - Trainingfactory'
        ]);
    }

    /**
     * @Route("/login", name="login")
     */

    public function showLogin(Request $request,AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();

        $lastUsername = $authUtils->getLastUsername();


        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/registreer", name="registreer")
     */

    public function showRegistreer(Request $request,UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->add('save', SubmitType::class, array('label'=>"registreren"));
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            // 2.5) Is the user new, gebruikersnaam moet uniek zijn
            $repository=$this->getDoctrine()->getRepository(User::class);
            $bestaande_user=$repository->findOneBy(['username'=>$form->getData()->getUsername()]);

            if($bestaande_user==null)
            {
                // 3) Encode the password (you could also do this via Doctrine listener)
                $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);
                $user->setRoles(['ROLE_USER']);
                // 4) save the User!
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $this->addFlash(
                    'notice',
                    $user->getNaam().' is geregistreerd!'
                );

                return $this->redirectToRoute('index');
            }
            else
            {
                $this->addFlash(
                    'error',
                    $user->getUsername()." bestaat al!"
                );
                return $this->render('bezoeker/registreren.html.twig', [
                    'form'=>$form->createView()
                ]);
            }
        }

        return $this->render('registreer.html.twig', [
            'form'=>$form->createView()
        ]);
    }


}