<?php

namespace Pgde\EmploiBundle\Admin;
use Pgde\EmploiBundle\Form\RegistrationType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserdataAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('utilisateur', RegistrationType::class)
            ->add('academic', EntityType::class, [
                'label' => 'Niveau de formation: ',
                'class' => 'Pgde\EmploiBundle\Entity\Academic',
                'required' => false,
                'placeholder' => 'Choisir le niveau de formation',
                'attr' => [
                    'class' => 'select2'
                ]
            ])
            ->add('datenaiss', DateType::class, array(
                'label' => 'Date de naissance: ',
                'required' => true,
                'widget' => 'single_text',
                'html5' => true,
            ))
            ->add('lieunaiss', TextType::class, [
                'label' => 'Lieu de naissance: ',
                'required' => true
            ])
            ->add('lieuresidence', TextType::class, [
                'label' => 'Lieu de residence: ',
                'required' => false
            ])
            ->add('genre', ChoiceType::class, array(
                'placeholder' => 'Selectionner votre genre',
                'choices' => array('Masculin' => 'Masculin', 'Feminin' => 'Feminin'),
                'label' => 'Genre: ',
                'required' => true,
//                'expanded' => true,
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
            ->add('telephone1', TextType::class, [
                'required' => true,
                'label' => 'Telephone: '
            ])
            ->add('telephone2', TextType::class, [
                'required' => false,
                'label' => 'Telephone 2: '
            ])
            ->add('nombreenfant', NumberType::class, [
                'label' => 'Nombre d\'enfants: ',
                'required' => false,
            ])
            ->add('diplome', TextType::class, [
                'required' => false,
                'label' => 'Intitulé du diplôme: '
            ])
            ->add('autresdiplomes', TextType::class, [
                'required' => false,
                'label' => 'Autres diplômes et/ou formations: '
            ])
            ->add('experiences', TextareaType::class, [
                'label' => 'Expériences professionnelles / Commentaires: ',
                'required' => false,
                'attr' => [
                    'rows' => '5'
                ]
            ])
            ->add('motivation', TextareaType::class, [
                'label' => 'Lettre de motivation: ',
                'required' => false,

                'attr' => [
                    'rows' => '5'
                ]
            ])
            ->add('anneediplome', TextType::class, [
                'required' => false,
                'label' => 'Année d\'obtention du diplôme: '
            ])
            ->add('anneeexperience1', NumberType::class, [
                'label' => 'Nombre d\'années d\'expérience sur l\'emploi sollicité: ',
                'required' => false,
            ])
            ->add('anneeexperience2', NumberType::class, [
                'label' => 'Nombre d\'années d\'expérience sur l\'emploi sollicité: ',
                'required' => false,
            ])
            ->add('specialite', TextType::class, [
                'required' => false,
                'label' => 'Specialité: '
            ])
            ->add('etablissementdiplome', TextType::class, [
                'required' => false,
                'label' => 'Etablissement d\'obtention du dernier diplôme: '
            ])
            ->add('handicap', EntityType::class, [
                'class' => 'Pgde\EmploiBundle\Entity\Handicap',
                'placeholder' => 'Selectionner votre handicap',
                'label' => 'Handicap: ',
                'choice_label' => 'libelle',
                'required' => false,
                'attr' => [
                    'class' => 'select2'
                ]
            ]);;


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
            ->add('diplome')
            ->add('autrediplome')
            ->add('genre')
            ->add('situationmatrimoniale')
            ->add('regionNaiss')
            ->add('lieunaiss')
            ->add('regionResidence')
            ->add('lieuresidence')
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