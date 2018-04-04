<?php

namespace Pgde\EmploiBundle\Form;

use Pgde\EmploiBundle\Entity\Departement;
use Pgde\EmploiBundle\Entity\Emploi;
use Pgde\EmploiBundle\Entity\Region;
use Pgde\EmploiBundle\Entity\Secteur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserdataType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('academic', EntityType::class, [
                'label' => 'Niveau de formation: ',
                'class' => 'Pgde\EmploiBundle\Entity\Academic',
                'choice_label' => 'libelle',
                'required' => false,
                'placeholder' => 'Choisir le niveau de formation'
            ])
            ->add('datenaiss', DateType::class, array(
                'label' => 'Date de naissance: ',
                'required' => false
            ))
            ->add('lieunaiss', TextType::class, [
                'label' => 'Lieu de naissance: ',
                'required' => false
            ])
            ->add('lieuresidence', TextType::class, [
                'label' => 'Lieu de residence: ',
                'required' => false
            ])
            ->add('genre', ChoiceType::class, array(
                'choices' => array('Masculin' => 'Masculin', 'Feminin' => 'Feminin'),
                'label' => 'Genre: ',
                'required' => false
            ))
            ->add('situationmatrimoniale', ChoiceType::class, array(
                'label' => 'Situation matrimoniale: ',
                'choices' => array(
                    'Choisissez le groupe sanguin' => null,
                    'Célibataire' => 'Celibataire',
                    'Marié(e)' => 'Marie',
                    'Divorcé(e)' => 'Divorce',
                    'Veuf(ve)' => 'Veuf'),
                'required' => false
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
                'required' => false
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
                'required' => false
            ])
            ->add('motivation', TextareaType::class, [
                'label' => 'Lettre de motivation: ',
                'required' => false
            ])
            ->add('anneediplome', DateType::class, [
                'required' => false,
                'label' => 'Année du diplôme: '
            ])
            ->add('anneeexperience1', NumberType::class, [
                'label' => 'Nombre d\'années d\'expérience sur l\'emploi sollicité: ',
                'required' => false
            ])
            ->add('anneeexperience2', NumberType::class, [
                'label' => 'Nombre d\'années d\'expérience sur l\'emploi sollicité: ',
                'required' => false
            ])
            ->add('specialite', TextType::class, [
                'required' => false,
                'label' => 'Specialité: '
            ])
            ->add('etablissementdiplome', TextType::class, [
                'required' => false,
                'label' => 'Etablissement d\'obtention du dernier diplôme: '
            ])
            ->add('regionNaiss', EntityType::class, [
                'mapped' => false,
                'label' => 'Région de naissance',
                'class' => 'Pgde\EmploiBundle\Entity\Region',
                'choice_label' => 'libelle',
                'required' => false,
                'placeholder' => 'Choisir une région'
            ])
            ->add('regionResidence', EntityType::class, [
                'mapped' => false,
                'label' => 'Région de Residence',
                'class' => 'Pgde\EmploiBundle\Entity\Region',
                'choice_label' => 'libelle',
                'required' => false,
                'placeholder' => 'Choisir région de residence'
            ])
            ->add('secteur1', EntityType::class, [
                'mapped' => false,
                'label' => 'Secteur d\'emploi - choix 1: ',
                'class' => 'Pgde\EmploiBundle\Entity\Secteur',
                'choice_label' => 'libelle',
                'required' => false,
                'placeholder' => 'Selectionner un secteur - Choix 1'
            ])
            ->add('secteur2', EntityType::class, [
                'mapped' => false,
                'label' => 'Secteur d\'emploi - choix 2: ',
                'class' => 'Pgde\EmploiBundle\Entity\Secteur',
                'choice_label' => 'libelle',
                'required' => false,
                'placeholder' => 'Selectionner un secteur - choix 2'
            ])
//            ->add('utilisateur')
//            ->add('departementnaiss')
//            ->add('departementresidence')
//            ->add('emploi1')
//            ->add('emploi2')
//            ->add('handicap')
        ;
        $builder->get('regionNaiss')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $this->addDepartementField($form->getParent(), $form->getData(), 'departementnaiss');
            }
        );
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                $data = $event->getData();
                /* @var $department Departement */
                $department = $data->getDepartementnaiss();
                $form = $event->getForm();
                if ($department) {
                    // On récupère le département et la région
                    $region = $department->getRegion();
                    // On crée les 2 champs supplémentaires
                    $this->addDepartementField($form, $region, 'departementnaiss');
                    // On set les données
                    $form->get('regionNaiss')->setData($region);
                    $form->get('departementnaiss')->setData($department);
                } else {
                    // On crée les 2 champs en les laissant vide (champs utilisé pour le JavaScript)
                    $this->addDepartementField($form, null, 'departementnaiss');
                }
            }
        );

        $builder->get('regionResidence')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $this->addDepartementField($form->getParent(), $form->getData(), 'departementresidence');
            }
        );
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                $data = $event->getData();
                /* @var $department Departement */
                $department = $data->getDepartementresidence();

                $form = $event->getForm();
                if ($department) {
                    // On récupère le département et la région
                    $region = $department->getRegion();
                    // On crée les 2 champs supplémentaires
                    $this->addDepartementField($form, $region, 'departementresidence');
                    // On set les données
                    $form->get('regionResidence')->setData($region);
                    $form->get('departementresidence')->setData($department);
                } else {
                    // On crée les 2 champs en les laissant vide (champs utilisé pour le JavaScript)
                    $this->addDepartementField($form, null, 'departementresidence');
                }
            }
        );


        $builder->get('secteur1')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $this->addEmploymentField($form->getParent(), $form->getData(), 'emploi1');
            }
        );
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                $data = $event->getData();
                /* @var $employment Emploi */
                $employment = $data->getEmploi1();
                $form = $event->getForm();
                if ($employment) {
                    // On récupère le département et la région
                    $secteur = $employment->getSecteur();
                    // On crée les 2 champs supplémentaires
                    $this->addEmploymentField($form, $secteur, 'emploi1');
                    // On set les données
                    $form->get('secteur1')->setData($secteur);
                    $form->get('emploi1')->setData($employment);
                } else {
                    // On crée les 2 champs en les laissant vide (champs utilisé pour le JavaScript)
                    $this->addEmploymentField($form, null, 'emploi1');
                }
            }
        );

        $builder->get('secteur2')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $this->addEmploymentField($form->getParent(), $form->getData(), 'emploi2');
            }
        );
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                $data = $event->getData();
                /* @var $employment Emploi */
                $employment = $data->getEmploi2();
                $form = $event->getForm();
                if ($employment) {
                    // On récupère le département et la région
                    $secteur = $employment->getSecteur();
                    // On crée les 2 champs supplémentaires
                    $this->addEmploymentField($form, $secteur, 'emploi2');
                    // On set les données
                    $form->get('secteur2')->setData($secteur);
                    $form->get('emploi2')->setData($employment);
                } else {
                    // On crée les 2 champs en les laissant vide (champs utilisé pour le JavaScript)
                    $this->addEmploymentField($form, null, 'emploi2');
                }
            }
        );

    }

    private function addDepartementField(FormInterface $form, ?Region $region, $name)
    {
        if ($name == 'departementnaiss') {
            $placeholder = $region ? 'Sélectionnez votre département de naissance' : 'Sélectionnez votre région de naissance';
        } else {
            $placeholder = $region ? 'Sélectionnez votre département de residence' : 'Sélectionnez votre région de residence';
        }
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            $name,
            EntityType::class,
            null,
            [
                'class' => 'Pgde\EmploiBundle\Entity\Departement',
                'placeholder' => $placeholder,
                'required' => false,
                'auto_initialize' => false,
                'choices' => $region ? $region->getDepartements() : []
            ]
        );
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
//                $this->addVilleField($form->getParent(), $form->getData());
            }
        );
        $form->add($builder->getForm());
    }

    private function addEmploymentField(FormInterface $form, ?Secteur $secteur, $name)
    {
        if ($name == 'emploi1') {
            $placeholder = $secteur ? 'Sélectionnez l\'emploi - Choix 1' : 'Sélectionnez votre secteur d\'emploi - Choix 1';
        } else {
            $placeholder = $secteur ? 'Sélectionnez l\'emploi - Choix 2' : 'Sélectionnez votre secteur d\'emploi - Choix 2';
        }
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            $name,
            EntityType::class,
            null,
            [
                'class' => 'Pgde\EmploiBundle\Entity\Emploi',
                'placeholder' => $placeholder,
                'required' => false,
                'auto_initialize' => false,
                'choices' => $secteur ? $secteur->getEmplois() : []
            ]
        );
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
//                $this->addVilleField($form->getParent(), $form->getData());
            }
        );
        $form->add($builder->getForm());
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pgde\EmploiBundle\Entity\Userdata'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pgde_emploibundle_userdata';
    }


}
