<?php
namespace App\Controller;

use App\Entity\Menus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Plats;


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
    public function accueil(Request $request,ManagerRegistry $doctrine): Response
    {
        // Gestion des plats 
        $plats = $doctrine->getRepository(Plats::class)->findAll();

        // Gestion des menus 
        $menus = $doctrine->getRepository(Menus::class)->findAll();

        //Gestion de la session utilisateur
        $session = $request->getSession();
        $utilisateur = $session->get('utilisateur');
        
        if (is_null($utilisateur)) {
            // Si l'utilisateur n'est pas connecté (visiteur)
            return $this->render('accueil.html.twig'
            ,['plats'=> $plats,
            'menus'=> $menus]);
        }

        if (!in_array("ROLE_ADMIN", $utilisateur->getRoles())) {
            // Si l'utilisateur est pas connect mais n'est pas admin (utilisateur)
            return $this->render('accueil.html.twig', [
                'username' => $utilisateur->getUsername(),
                'plats'=> $plats,
                'menus'=> $menus
            ]);        }
        return $this->render('accueil.html.twig', [
            // Si l'utilisateur est pas connecté et admin (admin)
            'username' => $utilisateur->getUsername(),
            'plats'=> $plats,
            'menus'=> $menus,
            'admin' => true
        ]);
    }
}
