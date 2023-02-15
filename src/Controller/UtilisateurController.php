<?php
namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\Type\UtilisateurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UtilisateurRepository;
use Psr\Log\LoggerInterface;
use Doctrine\Persistence\ManagerRegistry;


class UtilisateurController extends AbstractController
{
    public function inscription(Request $request,LoggerInterface $logger,ManagerRegistry $doctrine): Response
    {
        // just set up a fresh $utilisateur object (remove the example data)
        $utilisateur = new Utilisateur();

        $form = $this->createForm(UtilisateurType::class, $utilisateur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$utilisateur` variable has also been updated
            $utilisateur = $form->getData();

            $entityManager = $doctrine->getManager();

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($utilisateur);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            return $this->redirectToRoute('app_restau_quai_antique');
        }

        return $this->renderForm('utilisateur/inscription.html.twig', [
            'form' => $form,
        ]);
    }

    public function connexion(Request $request,LoggerInterface $logger,ManagerRegistry $doctrine): Response
    {
        // just set up a fresh $utilisateur object (remove the example data)
        $utilisateur = new Utilisateur();

        $form = $this->createForm(UtilisateurType::class, $utilisateur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$utilisateur` variable has also been updated
            $utilisateur = $form->getData();

            $entityManager = $doctrine->getManager();

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($utilisateur);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            return $this->redirectToRoute('app_restau_quai_antique');
        }

        return $this->renderForm('utilisateur/connexion.html.twig', [
            'form' => $form,
        ]);
    }
}
