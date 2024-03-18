<?php

namespace App\Form;

use App\Entity\Candidat;
use App\Entity\Experience;
use App\Entity\Gender;
use App\Entity\Media;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Importe le type EntityType pour les relations avec les entités
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname') // Champ pour le prénom
            ->add('lastname') // Champ pour le nom de famille
            ->add('adress') // Champ pour l'adresse
            ->add('country') // Champ pour le pays
            ->add('nationality') // Champ pour la nationalité
            ->add('birthdate', null, [
                'widget' => 'single_text', // Champ pour la date de naissance avec un widget pour sélectionner une seule date
            ])
            ->add('birthPlace') // Champ pour le lieu de naissance
            ->add('shortDescription') // Champ pour une brève description
            ->add('createdAt', null, [
                'widget' => 'single_text', // Champ pour la date de création avec un widget pour sélectionner une seule date
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text', // Champ pour la date de mise à jour avec un widget pour sélectionner une seule date
            ])
            ->add('deletedAt', null, [
                'widget' => 'single_text', // Champ pour la date de suppression avec un widget pour sélectionner une seule date
            ])
            ->add('jobCategory') // Champ pour la catégorie d'emploi
            ->add('adminNote') // Champ pour la note administrative
            ->add('isAvailable') // Champ pour indiquer si le candidat est disponible ou non
            ->add('Gender', EntityType::class, [
                'class' => Gender::class, // Champ pour sélectionner le genre à partir d'une liste de genres disponibles
                'choice_label' => 'id', // Utilise l'identifiant de l'entité Gender comme étiquette de choix
            ])
            ->add('user', EntityType::class, [
                'class' => User::class, // Champ pour sélectionner un utilisateur associé à ce candidat
                'choice_label' => 'id', // Utilise l'identifiant de l'entité User comme étiquette de choix
            ])
            ->add('cv', EntityType::class, [
                'class' => Media::class, // Champ pour sélectionner un CV à partir d'une liste de médias disponibles
                'choice_label' => 'id', // Utilise l'identifiant de l'entité Media comme étiquette de choix
            ])
            ->add('profilPic', EntityType::class, [
                'class' => Media::class, // Champ pour sélectionner une photo de profil à partir d'une liste de médias disponibles
                'choice_label' => 'id', // Utilise l'identifiant de l'entité Media comme étiquette de choix
            ])
            ->add('passport', EntityType::class, [
                'class' => Media::class, // Champ pour sélectionner un passeport à partir d'une liste de médias disponibles
                'choice_label' => 'id', // Utilise l'identifiant de l'entité Media comme étiquette de choix
            ])
            ->add('experience', EntityType::class, [
                'class' => Experience::class, // Champ pour sélectionner une expérience à partir d'une liste d'expériences disponibles
                'choice_label' => 'id', // Utilise l'identifiant de l'entité Experience comme étiquette de choix
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class, // Configure cette classe de formulaire pour lier les données à l'entité Candidat
        ]);
    }
}