<?php

namespace App\Form;

use App\Entity\Mebel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MebelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ilosc_polek','integer',array('min'=> 1)
            )
            ->add('nazwa')
            ->add('pokoj_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mebel::class,
        ]);
    }
}
