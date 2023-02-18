<?php
namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\Type\UtilisateurType;
use App\Form\Type\UtilisateurConnType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\RequestStack;


class UtilisateurController extends AbstractController
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;

        // Accessing the session in the constructor is *NOT* recommended, since
        // it might not be accessible yet or lead to unwanted side-effects
        // $this->session = $requestStack->getSession();
    }

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

    public function connexion(Request $request,ManagerRegistry $doctrine): Response
    {
        // just set up a fresh $utilisateur object (remove the example data)
        $utilisateur_form = new Utilisateur();
        $utilisateur_form->setUsername("ConnexionUser");
        $form = $this->createForm(UtilisateurConnType::class, $utilisateur_form);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$utilisateur_form` variable has also been updated
            $utilisateur_form = $form->getData();

            $utilisateur = $doctrine->getRepository(Utilisateur::class)->findOneBy(array('mail'=>$utilisateur_form->getMail(),'password'=>$utilisateur_form->getPassword()));

            if ($utilisateur==null) {
                throw $this->createNotFoundException(
                    'No utilisateur found for mail '.$utilisateur_form->getMail()
                );
            }

            $session = $this->requestStack->getSession();
            $session->set('utilisateur', $utilisateur);

            return $this->redirectToRoute('app_restau_quai_antique');
        }
        

        return $this->renderForm('utilisateur/connexion.html.twig', [
            'form' => $form,
        ]);
    }

    public function deconnexion(Request $request,LoggerInterface $logger): Response
    {
        $session = $request->getSession();
        $utilisateur = $session->remove('utilisateur');

        return $this->render('accueil.html.twig');
    }
}
