<?php

namespace App\Form;

use App\Entity\Recruitment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecruitmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Contenu'
            ])
            ->add('published_on', DateTimeType::class, [
                'label' => 'Annonce publié le...',
                'widget' => 'single_text',
                'input' => 'datetime',
            ])
            ->add('visibility', ChoiceType::class, [
                'label' => 'Visibilitée de l\'annonce',
                'choices' => [
                    'Visible' => 1, 
                    'Non-visible' => 0
                ],
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recruitment::class,
        ]);
    }
}
