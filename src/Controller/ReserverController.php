<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReserverController extends AbstractController
{
    /**
     * @Route("/reserver")
     */
    public function reserver(): Response
    {
        $number = random_int(0, 100);

        return $this->render('reserver.html.twig', [
            'number' => $number,
        ]);
    }
}