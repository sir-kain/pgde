<?php
/**
 * Created by PhpStorm.
 * User: waly
 * Date: 10/04/18
 * Time: 14:52
 */
namespace Pgde\EmploiBundle\EventListener;


use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PasswordResettingListener implements EventSubscriberInterface
{
    private $router;
    private $session;
    public function __construct(UrlGeneratorInterface $router, Session $session)
    {
        $this->router = $router;
        $this->session = $session;
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
            FOSUserEvents::RESETTING_RESET_SUCCESS => 'onPasswordResettingSuccess'
        ];
    }

    public function onPasswordResettingSuccess(FormEvent $event)
    {
        $url = $this->router->generate('userdata_new');
        $event->setResponse(new RedirectResponse($url));
        $this->session->getFlashBag()
            ->add('CHANGE_PASSWORD', 'Votre mot de passe a bien été changé');
    }
}