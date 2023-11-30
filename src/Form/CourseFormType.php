<?php

namespace App\Form;

use App\Entity\Courses;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CourseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('description', TextType::class, ['label' => 'Description'])
            ->add('duration', TextType::class, ['label' => 'Durée'])
            ->add('difficulty', TextType::class, ['label' => 'Difficulté'])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'label', // Assuming Category has a 'name' property
            ])
            // ->add('chapters', CollectionType::class, [
            //     'entry_type' => ChapterFormType::class,
            //     'allow_add' => true,
            // ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => ['envoyer' => 'save']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Courses::class,
        ]);
    }
}
