<?php

namespace Pgde\EmploiBundle\Admin;

use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use FOS\UserBundle\Model\UserManagerInterface;
use Sonata\AdminBundle\Route\RouteCollection;


class UserAdmin extends BaseUserAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->with('General')
            ->add('username')
            ->add('email')
            ->end()// .. more info
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {

        $formMapper
            ->with('General')
            ->add('username')
            ->add('email')
            ->add('plainPassword', 'text', array('required' => false))
            ->end()// .. more info
        ;

        if (!$this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
            $formMapper
                ->with('Management')
                ->add('roles', 'sonata_security_roles', array(
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false
                ))
//                ->add('locked', null, array('required' => false))
//                ->add('expired', null, array('required' => false))
                ->add('enabled', null, array('required' => false))
//                ->add('credentialsExpired', null, array('required' => false))
                ->end();
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper): void
    {
        $filterMapper
            ->add('id')
            ->add('username')
//            ->add('locked')
            ->add('email');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('enabled', null, array('editable' => true))
//            ->add('locked', null, array('editable' => true))
            ->add('dateInscription', null, array(
                'label' => 'Date d\'inscription: ',
                'required' => true,
                'widget' => 'single_text',
                'html5' => true,
            ));

//        if ($this->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
//            $listMapper
//                ->add('impersonating', 'string', array('template' => 'SonataUserBundle:Admin:Field/impersonating.html.twig'));
//        }
    }
}
