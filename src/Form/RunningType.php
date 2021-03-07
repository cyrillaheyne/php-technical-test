<?php

namespace App\Form;

use App\Entity\Running;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RunningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate')
            ->add('duration')
            ->add('distance')
            ->add('comment')
            ->add('user')
            ->add('type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Running::class,
        ]);
    }
}
