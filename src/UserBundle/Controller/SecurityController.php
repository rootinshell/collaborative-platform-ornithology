<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    /**
     * @Route("/connexion", name="core_login")
     * @Method("GET")
     * @Security("has_role('IS_AUTHENTICATED_REMEMBERED')")
     */
    public function loginAction(Request $request)
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
	    if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
	      	return $this->redirectToRoute('core_home');
	    }

	    // Le service authentication_utils permet de récupérer le nom d'utilisateur
	    // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
	    // (mauvais mot de passe par exemple)
	    $authenticationUtils = $this->get('security.authentication_utils');

	    return $this->render('security/login.html.twig', array(
	      	'last_username' => $authenticationUtils->getLastUsername(),
	      	'error'         => $authenticationUtils->getLastAuthenticationError(),
	    ));
    }
}
