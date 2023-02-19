<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class AdminController extends AbstractController
{


    public function index(Request $request): Response
    {

        $session = $request->getSession();
        $utilisateur = $session->get('utilisateur');
        
        if (is_null($utilisateur)) {
            return $this->redirectToRoute('app_restau_quai_antique');
        }
        

        if (!in_array("ROLE_ADMIN", $utilisateur->getRoles())) {
            $this->denyAccessUnlessGranted('ROLE_ADMIN');
        }

        // // or add an optional message - seen by developers
        // $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN'); 
        
        return $this->render('admin.html.twig', [
            'username' => $utilisateur->getUsername(),
            'admin' => true
        ]);
    }
}