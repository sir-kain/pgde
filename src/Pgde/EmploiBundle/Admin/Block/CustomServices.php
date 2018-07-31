<?php
/**
 * Created by PhpStorm.
 * User: waly
 * Date: 27/07/18
 * Time: 13:00
 */
namespace Pgde\EmploiBundle\Admin\Block;
use Doctrine\ORM\EntityManagerInterface;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\Service\AbstractBlockService;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\CoreBundle\Validator\ErrorElement;
use Symfony\Bridge\Twig\TwigEngine;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomServices extends AbstractBlockService
{

    private $entityManager;

    public function __construct(string $serviceId, TwigEngine $templating, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct($serviceId, $templating);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Stats Block';
    }

    /**
     * {@inheritdoc}
     */
    public function configureSettings(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'entity' => 'Pgde\EmploiBundle\Entity\Userdata',
            'repository_method' => 'findAll',
            'title' => 'Insert block Title',
            'css_class' => 'bg-blue',
            'icon' => 'fa-users',
            'template' => 'block_stats.html.twig',
            'route' =>  'route'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
        $formMapper->add('settings', 'sonata_type_immutable_array', array(
            'keys' => array(
                array('entity', 'text', array('required' => false)),
                array('repository_method', 'text', array('required' => false)),
                array('title', 'text', array('required' => false)),
                array('css_class', 'text', array('required' => false)),
                array('icon', 'text', array('required' => false)),
                array('route', 'text', array('required' => false)),
            ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
        $errorElement
            ->with('settings[entity]')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('settings[repository_method]')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('settings[title]')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->assertMaxLength(array('limit' => 50))
            ->end()
            ->with('settings[css_class]')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end()
            ->with('settings[icon]')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->end();
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        $settings = $blockContext->getSettings();
        $entity = $settings['entity'];
        $method = $settings['repository_method'];

        $rows = $this->entityManager->getRepository($entity)->$method();

        return $this->templating->renderResponse($blockContext->getTemplate(), array(
            'count'     => $rows,
            'block'     => $blockContext->getBlock(),
            'settings'  => $settings,
        ), $response);
    }
}