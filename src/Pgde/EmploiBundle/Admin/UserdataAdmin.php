<?php

namespace Pgde\EmploiBundle\Admin;
use Pgde\EmploiBundle\Entity\Departement;
use Pgde\EmploiBundle\Entity\Region;
use Pgde\EmploiBundle\Entity\Userdata;
use Pgde\EmploiBundle\Entity\Utilisateur;
use Pgde\EmploiBundle\Form\RegistrationType;
use Pgde\EmploiBundle\Form\UtilisateurType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class UserdataAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Modifier', ['class' => 'col-md-9'])
            ->add('utilisateur.id', null, [
                'label' =>  'Numéro Fonction Publique',
                'disabled'  =>  true
            ])
            ->add('utilisateur.numberid', null, [
                'label' =>  'Numéro d\'identité',
                'disabled'  =>  true
            ])
            ->add('utilisateur.email', null, [
                'label' =>  'Adresse e-mail'
            ])
            ->add('utilisateur.enabled', CheckboxType::class, [
                'label' =>  'Active'
            ])
            ->end()
            ->with('Meta data', ['class' => 'col-md-3'])
            ->add('utilisateur.firstname', null, [
                'label' =>  'Nom',
                'disabled'  =>  true
            ])
            ->add('utilisateur.lastname', null, [
                'label' =>  'Nom',
                'disabled'  =>  true
            ])
            ->add('telephone1', null, [
                'label' =>  'Telephone',
                'disabled'  =>  true
            ])
            ->add('datenaiss', null, [
                'label' =>  'Date de naissance',
                'disabled'  =>  true
            ])
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('utilisateur.id', null, [
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
            ->add('departementnaiss', null, [
                'label' =>  'Département de naissance',
            ], EntityType::class, [
                'class' =>  Departement::class,
                'choice_label'  =>  'libelle'
            ])
            ->add('regionnaiss', null, [
                'label' =>  'Région de naissance'
            ], EntityType::class, [
                'class' =>  Region::class,
                'choice_label'  =>  'libelle'
            ])
            ->add('lieunaiss', null, [
                'label' =>  'Lieu de naissance'
            ])
            ->add('lieuresidence', null, [
                'label' =>  'Lieu de résidence'
            ])
            ->add('departementresidence', null, [
                'label' =>  'Département de résidence',
            ], EntityType::class, [
                'class' =>  Departement::class,
                'choice_label'  =>  'libelle'
            ])
            ->add('regionresidence', null, [
                'label' =>  'Département de résidence',
            ], EntityType::class, [
                'class' =>  Region::class,
                'choice_label'  =>  'libelle'
            ])
            ->add('telephone1', null, [
                'label' =>  'Téléphone'
            ])

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
            ->add('departementNaiss', null, [
                'label' =>  'Département de naissance'
            ])
            ->add('regionNaiss', null, [
                'label' =>  'Région de naissance'
            ])
            ->add('lieunaiss', null, [
                'label' =>  'Lieu de naissance'
            ])
            ->add('lieuresidence', null, [
                'label' =>  'Lieu de résidence'
            ])
            ->add('departementResidence', null, [
                'label' =>  'Département de residence'
            ])
            ->add('regionresidence', null, [
                'label' =>  'Région de residence'
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

    public function toString($object)
    {
        return $object instanceof Userdata
            ? 'DEMANDEUR: '. $object->getUtilisateur()->getUsername() .' - NUMERO FP: '. $object->getUtilisateur()->getId()
            : 'DEMANDEUR'; // shown in the breadcrumb on the create view
    }
}