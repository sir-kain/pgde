<?php

namespace Pgde\EmploiBundle\Admin;
use Pgde\EmploiBundle\Form\RegistrationType;
use Pgde\EmploiBundle\Form\UtilisateurType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class UserdataAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('utilisateur', UtilisateurType::class)


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
            ->addIdentifier('telephone1')
            ->add('specialite')
            ->add('genre')
            ->add('situationmatrimoniale')
            ->add('regionNaiss')
            ->add('lieunaiss')
            ->add('regionResidence')
            ->add('lieuresidence')
            ->add('utilisateur', UtilisateurType::class)
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