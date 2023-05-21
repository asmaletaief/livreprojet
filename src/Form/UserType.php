<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add(
                $builder->create('roles', ChoiceType::class, [
                    'choices' => [
                        'User' => 'ROLE_USER',
                        'Auteur' => 'ROLE_ADMIN',
                        // other roles...
                    ],
                    'mapped' => true,
                    'multiple' => false,
                    'expanded' => true, // this makes the choices to be presented as radio buttons
                ])->addModelTransformer(new CallbackTransformer(
                    function ($rolesArray) {
                         // transform the array to a string
                         return count($rolesArray)? $rolesArray[0]: null;
                    },
                    function ($rolesString) {
                         // transform the string back to an array
                         return [$rolesString];
                    }
                ))
            )
        
            ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
