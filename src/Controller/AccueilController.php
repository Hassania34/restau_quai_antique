<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class AccueilController extends AbstractController
{

    private $repository;
    private $requestStack;

    public function __construct(UtilisateurRepository $repository,RequestStack $requestStack){
        $this->repository = $repository;
        $this->requestStack = $requestStack;
    }
    /**
     * @Route("/")
     */
    public function accueil(Request $request): Response
    {
        $session = $request->getSession();
        $utilisateur = $session->get('utilisateur');
        
        if (is_null($utilisateur)) {
            return $this->render('accueil.html.twig');
        }

        return $this->render('accueil.html.twig', [
            'utilisateur' => $utilisateur->getUsername()
        ]);
    }
}
