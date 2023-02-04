<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => false,
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre prénom.',
                    'class' => 'w-50 m-auto mt-2',

                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre nom.',
                    'class' => 'w-50 m-auto',
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 60
                ]),
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre email',
                    'class' => 'w-50 m-auto',
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la conformation doivent être identique',
                'label' => false,
//                'constraints' => new Length([
//                    'min' => 2,
//                    'max' => 30
//                ]),
                'required' => true,
                'first_options' => [
                    'label' => false,
                    'attr' => [
                        'placeholder'=> 'Merci de saisir votre mot de passe',
                        'class' => 'w-50 m-auto',
                        ],
                    ],
                'second_options' => [
                    'label' => false,
                    'attr' => [
                        'placeholder'=> 'Merci de confirmer votre mot de passe',
                        'class' => 'w-50 m-auto',
                        ],
                    ],
            ])
            ->add( 'submit', SubmitType::class, [
                'label' => "S'inscrire",
                'attr' => [
                    'class' => 'btn btn-block w-50 m-auto',
                    'style' => 'background-color: #dcb958',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => [
                'class' => 'p-5',
            ]
        ]);
    }
}
