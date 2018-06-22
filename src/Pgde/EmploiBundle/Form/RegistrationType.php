<?php
//
namespace Pgde\EmploiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numberid', TextType::class, [
                'label' => 'Numéro CIN / Passport:'
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