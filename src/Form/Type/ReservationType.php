<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbcouvert', IntegerType::class)
            ->add('date', DateType::class)
            ->add('heure', TimeType::class)
            ->add('allergies', TextareaType::class)
            ->add('save', SubmitType::class)
        ;
    }

    // public function configureOptions(OptionsResolver $resolver): void
    // {
    //     $resolver->setDefaults([
    //         // Configure your form options here
    //     ]);
    // }
}
