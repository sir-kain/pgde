<?php

namespace Pgde\EmploiBundle\Admin;
use Pgde\EmploiBundle\Entity\Userdata;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class UtilisateurAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {

    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', null, [
                'label' =>  'Numéro FP'
            ])
            ->add('numberid', null, [
                'label' =>  'Numéro CIN / Passport'
            ])
            ->add('username', null, [
                'label' =>  'Nom d\'utilisateur'
            ])
            ->add('firstname', null, [
                'label' =>  'Prénom'
            ])
            ->add('lastname', null, [
                'label' =>  'Nom'
            ])
            ->add('enabled')
            ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
    }

    public function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
    }

    public function toString($object)
    {
        return $object instanceof Userdata
            ? 'Utilisateur: '. $object->getUsername()
            : 'Utilisateur'; // shown in the breadcrumb on the create view
    }

//    les formats
    public function getExportFormats()
    {
        return ['xls', 'csv'];
    }

}