<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil")
     */
    public function accueil(): Response
    {
        $number = random_int(0, 100);

        return $this->render('accueil.html.twig', [
            'number' => $number,
        ]);
    }
}