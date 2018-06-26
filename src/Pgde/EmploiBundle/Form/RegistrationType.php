<?php
//
namespace Pgde\EmploiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numberid', TextType::class, [
                'label' => 'Numéro CIN / Passport:',
                'constraints'   =>  new Regex([
                    'pattern' => "/^(^(^(\d{1}([a-z]|\d{1})\d{11})$|\d{14}$)|[a-z]\d{8})$/i",
                    'message'   =>  "Le numéro n\'est pas valide"
                ])
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom: '
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom: '
            ])

        ;
    }

    public function getParent()

    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()

    {
        return 'app_user_registration';
    }

    public function getName()

    {
        return $this->getBlockPrefix();
    }
}