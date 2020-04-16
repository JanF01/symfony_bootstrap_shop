<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(){
        
        $entityManager = $this->getDoctrine()->getManager();
        
        $user = new User();

        $login = "kirito19";
        $password = "looooolololololo";
        $firstname = "Jan";
        $lastname = "Not set";
        $email = "margo01_1@interia.pl";
        $createdAt = new \DateTime('@'.strtotime('now'));

        $user->setLogin($login);
        $user->setPassword($password);
        $user->setFirstName($firstname);
        $user->setEmail($email);
        $user->setCreated($createdAt);

        $entityManager->persist($user);

        $entityManager->flush();

        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
            'login' => $login,
            'password' => $password,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
        ]);
    }
}
