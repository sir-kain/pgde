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
            ->add('utilisateur.plainPassword', RepeatedType::class, array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'form.password'),
                    'second_options' => array('label' => 'form.password_confirmation'),
                    'invalid_message' => 'fos_user.password.mismatch',
                    'required'    => false,
                )
            )
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
            ->add('emploi1', null, [
                'label' =>  'Emploi 1',
            ], EntityType::class, [
                'class' =>  Emploi::class,
                'choice_label'  =>  'libelle'
            ])
            ->add('emploi2', null, [
                'label' =>  'Emploi 2',
            ], EntityType::class, [
                'class' =>  Emploi::class,
                'choice_label'  =>  'libelle'
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
            ->add('utilisateur.firstname', null, [
                'label' =>  'Prenom'
            ])
            ->add('utilisateur.lastname', null, [
                'label' =>  'Nom'
            ])
            ->add('utilisateur.numberid', null, [
                'label' =>  'Numéro d\'identité'
            ])
            ->add('utilisateur.username', null, [
                'label' =>  'Nom d\'utilisateur'
            ])
            ->add('utilisateur.dateInscription', null, [
                'label' =>  'Date d\'inscription',
                'format'    =>  'd-m-Y'
            ])
            ->add('datenaiss', null, [
                'label' =>  'Date de naissance',
                'format'    =>  'd-m-Y'
            ])
            ->add('lieunaiss', null, [
                'label' =>  'Lieu de naissance'
            ])
            ->add('telephone1', null, [
                'label' =>  'Téléphone'
            ])
            ->add('emploi1', null, [
                'label' =>  'Emploi 1'
            ])
            ->add('anneeexperience1', null, [
                'label' =>  'Experience 1'
            ])
            ->add('emploi2', null, [
                'label' =>  'Emploi 2'
            ])
            ->add('anneeexperience2', null, [
                'label' =>  'Experience 2'
            ])
            ->add('diplome', null, [
                'label' =>  'Diplome'
            ])
            ->add('academic', null, [
                'label' =>  'Niveau academique'
            ])
            ->add('anneediplome', null, [
                'label' =>  'Année obtention diplome'
            ])
            ->add('etablissementdiplome', null, [
                'label' => 'Etablissement d\'obtention du dernier diplôme: '
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
            ->add('lieuresidence', null, [
                'label' =>  'Lieu de résidence'
            ])
            ->add('departementResidence', null, [
                'label' =>  'Département de residence'
            ])
            ->add('regionresidence', null, [
                'label' =>  'Région de residence'
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
            ? 'DEMANDEUR: '. $object->getUtilisateur()->getUsername() .' - NUMERO FP: '. $object->getUtilisateur()->getId()
            : 'DEMANDEUR'; // shown in the breadcrumb on the create view
    }

    public function prePersist($object) {
        parent::prePersist($object);
        $this->updateUser($object->getUtilisateur());
    }

    public function preUpdate($object) {
        parent::preUpdate($object);
        $this->updateUser($object->getUtilisateur());
    }

    public function updateUser(Utilisateur $u) {
        if ($u->getPlainPassword()) {
            $u->setPlainPassword($u->getPlainPassword());
        }

        $um = $this->getConfigurationPool()->getContainer()->get('fos_user.user_manager');
        $um->updateUser($u, false);
    }

    //Pour exporter
    public function getExportFields()
    {
        return [
            'Numero Inscription' => 'utilisateur.id',
            'Numero CIN / Passport' => 'utilisateur.numberId',
            'Prenom' => 'utilisateur.firstname',
            'Nom' => 'utilisateur.lastname',
            'Nom d\'utilisateur' => 'utilisateur.username',
            'Email' => 'utilisateur.email',
            'Date inscription' => 'utilisateur.dateInscription',
            'Date de naissance' => 'dateNaiss',
            'Lieu de naissance' => 'lieunaiss',
            'Telephone' => 'telephone1',
            'Emploi 1' => 'emploi1',
            'Emploi 2' => 'emploi2',
            'Intitulé du diplome' => 'diplome',
            'Niveau academique' => 'academic',
            'Année dernier diplome' => 'anneediplome',
            'Specialité' => 'specialite',
            'Etablissement obtention diplome' => 'etablissementdiplome',
            'CV' => 'experiences',
        ];
    }

//    les formats
    public function getExportFormats()
    {
        return ['xls', 'csv'];
    }
}