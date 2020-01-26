<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Rubrique;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entete')
            ->add('corps')
            ->add('rubrique', EntityType::class, [
                'class'        => Rubrique::class,
                'choice_label' => 'libelle'
            ])
            ->add(
                'images', FileType::class, [
                'mapped'   => true,
                'multiple' => true,
                'required' => false
                //                'class' => Image::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Annonce::class,
            ]);
    }
}
