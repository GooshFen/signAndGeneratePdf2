<?php

namespace App\Form;

use App\Entity\TeletravailForm;
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
            ->add('quotite', ChoiceType::class, [
            'choices'  => [
                'Temps complet' => 'Temps complet',
                'Temps partiel' => 'Temps partiel',
            ],])
            ->add('connexionInternet')
            // ->add('attestationHonneur')
            // ->add('attestationAssurance')
            ->add('activiteEligible')
            ->add('periodeEssaiEnCours')
            ->add('autonomieSuffisante')
            ->add('conditionsEligibilites')
            ->add('conditionsTechMatAdm')
            // ->add('avisSupHierarchique')
            ->add('commentaireSupHierarchique')
            // ->add('avisDrh')
            // ->add('commentaireDrh')
            // ->add('signatureSupHierarchique')
            // ->add('signatureDrh')
            ->add('signatureCollab')
            ->add('journeeTeletravaillees')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TeletravailForm::class,
        ]);
    }
}
