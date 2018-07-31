<?php

namespace Pgde\EmploiBundle\Admin;
use Pgde\EmploiBundle\Entity\Departement;
use Pgde\EmploiBundle\Entity\Emploi;
use Pgde\EmploiBundle\Entity\Region;
use Pgde\EmploiBundle\Entity\Userdata;
use Pgde\EmploiBundle\Entity\Utilisateur;
use Pgde\EmploiBundle\Form\RegistrationType;
use Pgde\EmploiBundle\Form\UtilisateurType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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

    //You can also hide an action from the dashboard by unsetting it:
    public function getDashboardActions()
    {
        $actions = parent::getDashboardActions();

        unset($actions['create']);

        return $actions;
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
            : 'DEMANDEUR'; // shown in the breadcrumb on the create view
    }

//    les formats
    public function getExportFormats()
    {
        return ['xls', 'csv'];
    }

}