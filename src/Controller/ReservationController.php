<?php 
namespace App\Controller;

use App\Entity\Reservation;
use App\Form\Type\ReservationType;
use symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ReservationController extends AbstractController
{

    public function reserver(Request $request): Response 
    {   
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        return $this->renderForm('reservation.html.twig', [
            'form' => $form,
        ]);
    }
  
}