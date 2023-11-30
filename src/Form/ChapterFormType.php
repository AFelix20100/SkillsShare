<?php

namespace App\Form;

use App\Entity\Courses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ChapterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('Video_Url', TextType::class, ['label' => 'Video URL'])
            ->add('content', TextType::class, ['label' => 'Contenu'])
            ->add('courses', EntityType::class, 
            [
                'class' => Courses::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'chapter',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
