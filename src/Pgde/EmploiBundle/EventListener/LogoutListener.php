<?php
/**
 * Created by PhpStorm.
 * User: waly
 * Date: 16/04/18
 * Time: 14:20
 */

namespace Pgde\EmploiBundle\EventListener;


use Doctrine\ORM\EntityManager;
use Pgde\EmploiBundle\Entity\Userdata;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

class LogoutListener implements LogoutHandlerInterface
{
    private $session;
    private $entityManager;

    public function __construct(Session $session, EntityManager $entityManager)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }

    /**
     * This method is called by the LogoutListener when a user has requested
     * to be logged out. Usually, you would unset session variables, or remove
     * cookies, etc.
     * @param Request $request
     * @param Response $response
     * @param TokenInterface $token
     */
    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        $user = $token->getUser();
        $useremail = $user->getEmail();
        $username = $user->getUsername();
        $urlavatar = $this->entityManager->getRepository(Userdata::class)
            ->get_gravatar($useremail, 80);
        $this->session->getFlashBag()
            ->add('logout', true);
        $this->session->getFlashBag()
            ->add('message', 'A bientôt pour des modifications suplementaires');
        $this->session->getFlashBag()
            ->add('class', 'gritter');
        $this->session->getFlashBag()
            ->add('urlavatar', $urlavatar);
        $this->session->getFlashBag()
            ->add('username', $username);
    }
}