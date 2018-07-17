<?php
/**
 * Created by PhpStorm.
 * User: waly
 * Date: 10/04/18
 * Time: 14:52
 */
namespace Pgde\EmploiBundle\EventListener;


use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
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
    private $twig;
    public function __construct(UrlGeneratorInterface $router, Session $session, EntityManager $entityManager, TokenStorageInterface $tokenStorage, \Twig_Environment $twig)
    {
        $this->router = $router;
        $this->session = $session;
        $this->entityManager = $entityManager;
        $this->token_storage = $tokenStorage;
        $this->twig = $twig;
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
            FOSUserEvents::REGISTRATION_CONFIRM => 'onRegisterConfirmedWithEmail',
            FOSUserEvents::CHANGE_PASSWORD_INITIALIZE => 'onChangePasswordLoad',
        ];
    }

    public function onChangePasswordLoad(GetResponseUserEvent $event)
    {
        $userdata = $this->entityManager->getRepository(Userdata::class)
            ->findOneBy(['utilisateur' => $event->getUser()]);
        $urlavatar = $this->entityManager->getRepository(Userdata::class)
            ->get_gravatar($event->getUser()->getEmail());
        $this->twig->addGlobal('urlavatar', $urlavatar);
        $this->twig->addGlobal('userdatum', $userdata);
    }

    public function onPasswordResettingSuccess(FormEvent $event)
    {
        $user = $event->getForm()->getData();
        $userdata = $this->entityManager->getRepository(Userdata::class)
            ->findOneBy(['utilisateur' => $user]);
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
            ->add('user', $userdata);
    }


    public function onRegisterConfirmedWithEmail(GetResponseUserEvent $event)
    {
        $url = $this->router->generate('userdata_new');
        $event->setResponse(new RedirectResponse($url));
        $this->session->getFlashBag()
            ->add('ACCOUNT_STATE', 'Bienvenue: Votre compte est maintenant actif. Merci de finaliser votre inscription');
    }

}