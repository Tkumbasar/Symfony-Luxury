<?php

namespace App\Controller;

use App\Entity\Candidat; // Importe l'entité Candidat
use App\Form\CandidatFormType; // Importe le formulaire CandidatFormType
use App\Repository\CandidatRepository; // Importe le dépôt (repository) CandidatRepository
use Doctrine\ORM\EntityManagerInterface; // Importe l'interface EntityManagerInterface pour gérer les entités
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // Importe la classe AbstractController de Symfony
use Symfony\Component\HttpFoundation\Request; // Importe la classe Request de Symfony pour gérer les requêtes HTTP
use Symfony\Component\HttpFoundation\Response; // Importe la classe Response de Symfony pour gérer les réponses HTTP
use Symfony\Component\Routing\Attribute\Route; // Importe l'attribut Route de Symfony pour définir les routes

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')] // Définit une route avec l'URL '/profile' et le nom 'app_profile'
    public function index(): Response
    {
        // Renvoie une réponse avec le rendu du template 'profile/index.html.twig'
        // En passant 'controller_name' avec la valeur 'ProfileController' au template
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
    
    #[Route('/profile', name: 'app_profile')]
    public function selectProfil(CandidatRepository $candidatRepository): Response
    {
        // Récupère tous les profils à partir du CandidatRepository
        $profiles = $candidatRepository->findAll();
        
        // Renvoie une réponse avec le rendu du template 'profile/index.html.twig'
        // En passant 'profiles' contenant les profils récupérés au template
        return $this->render('profile/index.html.twig', [
            'profiles' => $profiles
        ]);
    }

    #[Route('/profile', name: 'app_profile')]
    public function insertProfile(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Crée un nouvel objet Candidat pour représenter un profil
        $profile = new Candidat();
        
        // Crée un formulaire à partir de CandidatFormType, lié à l'objet Candidat créé précédemment
        $form = $this->createForm(CandidatFormType::class, $profile);
        
        // Gère la requête HTTP pour le formulaire
        $form->handleRequest($request);

        // Vérifie si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Persiste l'objet Candidat dans la base de données
            $entityManager->persist($profile);
            
            // Exécute les opérations en attente (insère l'objet dans la base de données)
            $entityManager->flush();

            // Redirige vers la route 'app_profile' après l'insertion du profil
            return $this->redirectToRoute('app_profile');
        }

        // Renvoie une réponse avec le rendu du template 'profile/index.html.twig'
        // En passant 'form' contenant le formulaire au template
        return $this->render('profile/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}