<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Quel nom souhaitez-vous donner à votre adresse ?',
                'attr' => [
                    'placeholder' => 'Nommer votre adresse',
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom ?',
                'attr' => [
                    'placeholder' => 'Entrée votre prénom',
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom ?',
                'attr' => [
                    'placeholder' => 'Entrée votre nom',
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'Quel est le nom de votre Société ?',
                'required' => false,
                'attr' => [
                    'placeholder' => '(facultatif) Entrez le nom de votre société',
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Votre adresse ?',
                'attr' => [
                    'placeholder' => '8 rue des lilas .....',
                ]
            ])
            ->add('postal', TextType::class, [
                'label' => 'Votre code postal ?',
                'attr' => [
                    'placeholder' => 'Entrée votre code postal',
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Votre ville ?',
                'attr' => [
                    'placeholder' => 'Entrée votre ville',
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays',
                'attr' => [
                    'placeholder' => 'Choissisez votre pays',
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Votre telephone ?',
                'attr' => [
                    'placeholder' => 'Entrée votre numéro',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn btn-info btn-block'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
