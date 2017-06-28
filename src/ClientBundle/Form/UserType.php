<?php
namespace ClientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username', TextType::class, [
        		'description' => "Username"
        ])
        ->add('$email',TextType::class, [
        		'description' => "Email"
        ])
        ->add('plainPassword',TextType::class, [
        		'description' => "Password"
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BileMoBundle\Entity\User'
        ));
    }
}