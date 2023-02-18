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
        $session = $request->getSession();
        $utilisateur = $session->get('utilisateur');
        if (is_null($utilisateur)) {
            return $this->renderForm('reservation.html.twig', [
                'form' => $form,
            ]);
        }
        return $this->renderForm('reservation.html.twig', [
            'form' => $form,
            'utilisateur' => $utilisateur->getUsername()
        ]);
    }
  
}