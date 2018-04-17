<?php
/**
 * Created by PhpStorm.
 * User: waly
 * Date: 16/04/18
 * Time: 15:29
 */

namespace Pgde\EmploiBundle\EventListener;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserManagerInterface;
use Pgde\EmploiBundle\Entity\Userdata;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;


class LoginListener
{
    protected $userManager;
    protected $session;
    protected $entityManager;

    public function __construct(UserManagerInterface $userManager, Session $session, EntityManager $entityManager)
    {
        $this->userManager = $userManager;
        $this->session = $session;
        $this->entityManager = $entityManager;

    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();

        $urlavatar = $this->entityManager->getRepository(Userdata::class)
            ->get_gravatar($user->getEmail(), 80);
        $this->session->getFlashBag()
            ->add('login', true);
        $this->session->getFlashBag()
            ->add('message', 'Bienvenue');
        $this->session->getFlashBag()
            ->add('class', 'gritter');
        $this->session->getFlashBag()
            ->add('urlavatar', $urlavatar);
        $this->session->getFlashBag()
            ->add('username', $user->getUsername());
    }
}