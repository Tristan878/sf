<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\PasswordAuthenticatedInterface;

class ProjetController extends AbstractController
{
    /**
     * @Route("/" , name="home")
     */
    public function index(UserPasswordHasherInterface $hasher): Response
    {
        /*$em=$this->getDoctrine()->getManager();
        $user = new User(); 
        $user->setEmail('tristancha87@gmail.com');
        $user->setPassword($hasher->hashPassword($user,'admin'));
        $em->persist($user);
        $em->flush();*/

        return $this->render('projet/index.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }

    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
