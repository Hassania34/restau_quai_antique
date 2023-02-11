<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AproposController extends AbstractController
{
    /**
     * @Route("/apropos")
     */
    public function Apropos(): Response
    {
        $number = random_int(0, 100);

        return $this->render('apropos.html.twig', [
            'number' => $number,
        ]);
    }
}