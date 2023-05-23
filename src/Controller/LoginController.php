<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        // Handle the login form submission
        if ($request->isMethod('POST')) {
            // Perform your login logic here
            $user = $this->getUser();
            if (in_array('ROLE_ADMIN', $user->getRoles(), true)) {
                // If the user has the 'ROLE_ADMIN' role, redirect to the admin index page
                return $this->redirectToRoute('app_main2');
            } else {
                // If the user has any other role (e.g., 'ROLE_USER'), redirect to the command index page
                return $this->redirectToRoute('app_commande_index');
            }

            // If login is successful, redirect to app_user_index route
            // return $this->redirectToRoute('app_commande_index');
        }

        //the else is causing the error
    //    else {
          // Handle failed authentication
          //return $this->redirectToRoute('app_login');
     // }

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }  
    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout(): void
    {
    // controller can be blank: it will never be called!
    throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}