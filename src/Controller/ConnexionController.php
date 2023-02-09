<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/connexion")
     */
    public function connexion(): Response
    {
        $number = random_int(0, 100);

        return $this->render('connexion.html.twig', [
            'number' => $number,
        ]);
    }
}