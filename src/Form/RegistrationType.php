<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => ['autofocus'=>true, 'placeholder' => 'Pseudo', 'class' => 'fieldFormLogin'],
                'label' => FALSE
            ])
            ->add('email', TextType::class, [
                'attr' => ['placeholder' => 'email', 'class' => 'fieldFormLogin'],
                'label' => FALSE
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['placeholder' => 'mot de passe', 'class' => 'fieldFormLogin'],
                'label' => FALSE
            ])
            ->add('confirm_password', PasswordType::class, [
                'attr' => ['placeholder' => 'confirmer le mot de passe', 'class' => 'fieldFormLogin'],
                'label' => FALSE
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
