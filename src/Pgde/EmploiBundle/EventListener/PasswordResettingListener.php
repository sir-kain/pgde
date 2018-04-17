<?php
/**
 * Created by PhpStorm.
 * User: waly
 * Date: 10/04/18
 * Time: 14:52
 */
namespace Pgde\EmploiBundle\EventListener;


use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\FOSUserEvents;
use Pgde\EmploiBundle\Entity\Userdata;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class PasswordResettingListener implements EventSubscriberInterface
{
    private $router;
    private $session;
    private $entityManager;
    private $token_storage;
    public function __construct(UrlGeneratorInterface $router, Session $session, EntityManager $entityManager, TokenStorageInterface $tokenStorage)
    {
        $this->router = $router;
        $this->session = $session;
        $this->entityManager = $entityManager;
        $this->token_storage = $tokenStorage;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            FOSUserEvents::CHANGE_PASSWORD_SUCCESS => 'onPasswordResettingSuccess',
            FOSUserEvents::RESETTING_RESET_SUCCESS => 'onPasswordResettingSuccess',
            FOSUserEvents::SECURITY_IMPLICIT_LOGIN => 'onUserLogged',
            FOSUserEvents::REGISTRATION_CONFIRMED => 'onRegisterConfirmed',
            FOSUserEvents::REGISTRATION_CONFIRM => 'onRegisterConfirmedWithEmail',
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegisterSuccessed',
        ];
    }

    public function onPasswordResettingSuccess(FormEvent $event)
    {
        $user = $this->token_storage->getToken()->getUser();
        $useremail = $user->getEmail();
        $username = $user->getUsername();
        $urlavatar = $this->entityManager->getRepository(Userdata::class)
            ->get_gravatar($useremail, 80);
        $url = $this->router->generate('userdata_new');
        $event->setResponse(new RedirectResponse($url));
        $this->session->getFlashBag()
            ->add('change_password', 'Votre mot de passe a bien été changé');
        $this->session->getFlashBag()
            ->add('class', 'gritter');
        $this->session->getFlashBag()
            ->add('urlavatar', $urlavatar);
        $this->session->getFlashBag()
            ->add('username', $username);
    }

    public function onRegisterConfirmedWithEmail(GetResponseUserEvent $event)
    {
        $url = $this->router->generate('userdata_new');
        $event->setResponse(new RedirectResponse($url));
        $this->session->getFlashBag()
            ->add('ACCOUNT_STATE', 'Bienvenue: Votre compte est maintenant actif!');
    }

    public function onRegisterConfirmed(FilterUserResponseEvent $event)
    {
        $url = $this->router->generate('userdata_new');
        $event->setResponse(new RedirectResponse($url));
        $this->session->getFlashBag()
            ->add('ACCOUNT_STATE', 'Bienvenue: Votre compte est maintenant actif!!');
    }


    public function onRegisterSuccessed(FormEvent $event)
    {
    }

    public function onUserLogged(UserEvent $event)
    {
        $this->session->getFlashBag()
            ->add('ACCOUNT_STATE', 'Connexion reussie!');
        $this->session->getFlashBag()
            ->add('CLASS', 'gritter');
    }
}