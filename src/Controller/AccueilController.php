<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Utilisateur;
use App\Form\Type\UtilisateurType;
use App\Repository\UtilisateurRepository;

class AccueilController extends AbstractController
{

    private $repository;

    public function __construct(UtilisateurRepository $repository){
        $this->repository = $repository;
    }
    /**
     * @Route("/")
     */
    public function accueil(): Response
    {
        return $this->render('accueil.html.twig');
    }
}
