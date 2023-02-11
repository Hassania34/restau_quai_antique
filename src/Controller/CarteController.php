<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarteController extends AbstractController
{
    /**
     * @Route("/carte")
     */
    public function carte(): Response
    {
        $number = random_int(0, 100);

        return $this->render('carte.html.twig', [
            'number' => $number,
        ]);
    }
}