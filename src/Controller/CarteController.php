<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CarteController extends AbstractController
{
    public function carte(Request $request): Response 
    {
    
        $session = $request->getSession();
        $utilisateur = $session->get('utilisateur');
        if (is_null($utilisateur)) {
            return $this->render('carte.html.twig', [
            ]);
        }
        return $this->render('carte.html.twig', [
            'username' => $utilisateur->getUsername()
        ]);
        return $this->render('carte.html.twig');
    }
}