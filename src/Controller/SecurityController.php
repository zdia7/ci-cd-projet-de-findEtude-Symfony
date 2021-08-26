<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Form\RegistrationType;


class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration()
    {
    	$user = new User();
        $form = $this->createForm(RegistrationType::Class, $user);
        return $this->render('security/registration.html.twig',['form' => $form->createView()]);
    }

    /**
     * @Route("dashboard", name="app_dashboard")
     */
    public function dashboard()
    {
        return $this->render('security/registration.html.twig',['form' => $form->createView()]);
    }
}
