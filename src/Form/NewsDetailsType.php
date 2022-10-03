<?php

namespace App\Form;

use App\Entity\NewsDetails;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('shortDescription')
            ->add('picture')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('userId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NewsDetails::class,
        ]);
    }
}
