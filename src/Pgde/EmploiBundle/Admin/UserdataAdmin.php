<?php

namespace Pgde\EmploiBundle\Admin;
use Pgde\EmploiBundle\Form\RegistrationType;
use Pgde\EmploiBundle\Form\UtilisateurType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class UserdataAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('utilisateur.id', null, [
                'label' =>  'Numéro Fonction Publique',
                'disabled'  =>  true
            ])
            ->add('utilisateur.numberid', null, [
                'label' =>  'Numéro d\'identité'
            ])
            ->add('utilisateur.enabled', CheckboxType::class, [
                'label' =>  'Active'
            ])


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
            ->addIdentifier('utilisateur.id', null, [
                'label' =>  'Numéro Fonction Publique'
            ])
            ->add('utilisateur.numberid', null, [
                'label' =>  'Numéro d\'identité'
            ])
            ->add('utilisateur.username', null, [
                'label' =>  'Nom d\'utilisateur'
            ])
            ->add('utilisateur.firstname', null, [
                'label' =>  'Prenom'
            ])
            ->add('utilisateur.lastname', null, [
                'label' =>  'Nom'
            ])
            ->add('datenaiss', null, [
                'label' =>  'Date de naissance',
                'format'    =>  'd-m-Y'
            ])
            ->add('specialite', null, [
                'label' =>  'Spécialité'
            ])
            ->add('genre', null, [
                'label' =>  'Genre'
            ])
            ->add('situationmatrimoniale', null, [
                'label' =>  'Situation matrimoniale'
            ])
            ->add('regionNaiss', null, [
                'label' =>  'Région de naissance'
            ])
            ->add('lieunaiss', null, [
                'label' =>  'Lieu de naissance'
            ])
            ->add('regionResidence')
            ->add('lieuresidence', null, [
                'label' =>  'Lieu de résidence'
            ])
            ->add('telephone1', null, [
                'label' =>  'Téléphone'
            ])
//            ->add('numberid', UtilisateurType::class)
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