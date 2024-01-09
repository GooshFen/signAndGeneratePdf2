<?php

namespace App\Form;

use App\Entity\TeletravailForm;
use App\EventSubscriber\FormSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TeletravailFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('natureContrat', ChoiceType::class, [
            'choices'  => [
                'CDI' => 'CDI',
                'CDD supérieur à 6 mois consécutif' => 'CDD supérieur à 6 mois consécutif',
            ],])
            // Ajouter un champs pour la quotité si ni temps partiel ou temps complet
            ->add('quotite', ChoiceType::class, [
            'choices'  => [
                'Temps complet' => 'Temps complet',
                'Temps partiel' => 'Temps partiel',
            ],])
            // Ajoute un souscripteur d'évènement sur le formualire pour afficher les champs en fonction des rôles
            ->addEventSubscriber(new FormSubscriber()) 
        ;
    }
    // permet de configurer les options passées au formulaire
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TeletravailForm::class,
            'user_roles' => [],
        ]);
    }
}
