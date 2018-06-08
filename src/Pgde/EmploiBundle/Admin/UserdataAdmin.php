<?php

namespace Pgde\EmploiBundle\Admin;
use Pgde\EmploiBundle\Form\RegistrationType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserdataAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('utilisateur', RegistrationType::class)
            ->add('lieunaiss', 'text', array(
                'label' => 'Lieu de naissance'
            ))
            ->add('lieuresidence', 'text', array(
                'label' => 'Lieu de residence'
            ))
            ->add('telephone1', null, array(
                'label' => 'Telephone 1'
            ))
            ->add('situationmatrimoniale', ChoiceType::class, array(
                'label' => 'Situation matrimoniale: ',
                'choices' => array(
                    'Situation matrimoniale: ' => null,
                    'Célibataire' => 'Celibataire',
                    'Marié(e)' => 'Marie',
                    'Divorcé(e)' => 'Divorce',
                    'Veuf(ve)' => 'Veuf'),
                'required' => false,
                'attr' => [
                    'class' => 'select2'
                ]
            ))
            ->add('genre', ChoiceType::class, array(
                'placeholder' => 'Selectionner votre genre',
                'choices' => array('Masculin' => 'Masculin', 'Feminin' => 'Feminin'),
                'label' => 'Genre: ',
                'required' => true,
//                'expanded' => true,
            ))
//            ->add('lieuresidence', 'entity', array(
//                'class' => 'AppBundle\Entity\User'
//            ))

            // if no type is specified, SonataAdminBundle tries to guess it
//            ->add('body')

            // ...
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('lieunaiss')
            ->add('telephone1')
            ->add('genre')
            ->add('situationmatrimoniale')
//            ->add('utilisateur')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('lieunaiss')
            ->add('lieuresidence')
            ->add('telephone1')
            ->add('genre')
//            ->add('lieunaiss')
        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('lieunaiss')
            ->add('lieuresidence')
            ->add('telephone1')
            ->add('genre')
//            ->add('utilisateur')
        ;
    }

}