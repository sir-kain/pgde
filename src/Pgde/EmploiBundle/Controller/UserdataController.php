<?php

namespace Pgde\EmploiBundle\Controller;

use Pgde\EmploiBundle\Entity\Userdata;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Userdatum controller.
 *
 * @Route("userdata")
 */
class UserdataController extends Controller
{
    /**
     * Lists all userdatum entities.
     *
     * @Route("/", name="userdata_index")
     * @Method("GET")
     */
    public function indexAction()
    {
//        $em = $this->getDoctrine()->getManager();

//        $userdatas = $em->getRepository('PgdeEmploiBundle:Userdata')->findAll();

        return $this->redirectToRoute('userdata_new');

//        return $this->render('userdata/index.html.twig', array(
//            'userdatas' => $userdatas,
//        ));
    }

    /**
     * Lists all userdatum entities.
     *
     * @Route("/lorem", name="userdata_index1")
     * @Method("GET")
     */
    public function index1Action()
    {
//        Update
        ini_set('max_execution_time', 5000);
        ini_set('memory_limit', '-1');
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
            ->getRepository(Userdata::class);
        $userdatas = $repository->findAll();
        foreach ($userdatas as $usd) {
            $departResid = $usd->getDepartementresidence();
            $departNaiss = $usd->getDepartementnaiss();
            if ($departResid !== null) {
                $regionResid = $departResid->getRegion();
                $usd->setRegionresidence($regionResid);
            }
            if ($departNaiss !== null) {
                $regionNaiss = $departNaiss->getRegion();
                $usd->setRegionnaiss($regionNaiss);
            }
        }
        $em->flush();

        return $this->render('userdata/index.html.twig');
    }

    /**
     * Creates a new userdatum entity.
     *
     * @Route("/new", name="userdata_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
//        dump(preg_match("/(^(^(\d{1}([a-z]|\d{1})\d{3})$|\d{4}$)|[a-z]\d{8})/", 1254785252525));
//        die();
        $userconnecter = $this->getUser();
        if ($userconnecter == null) {
            return $this->redirectToRoute('fos_user_security_login');
        }
        $repository = $this->getDoctrine()->getRepository(Userdata::class);
        $userdatum = $repository->findOneBy(['utilisateur' => $userconnecter]);
        $avatar = $repository->get_gravatar($userconnecter->getEmail());
        $ajout = false;

        $em = $this->getDoctrine()->getManager();

        if ($userdatum == null) {
            $ajout = true;
            $userdatum = new Userdata();
            $userdatum->setUtilisateur($userconnecter);
        }
        $form = $this->createForm('Pgde\EmploiBundle\Form\UserdataType', $userdatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dataemail = $this->getDoctrine()->getRepository(Userdata::class)
                ->checkEmail($form->getData()->getUtilisateur()->getEmail());
            $majeur = $this->getDoctrine()->getRepository(Userdata::class)
                ->checkDateNaiss($form->getData()->getDatenaiss());
            if (!$majeur) {
                $this
                    ->get('session')->getFlashBag()
                    ->add('age', "Vous n'avez pas l'age requis pour postuler une demande");
                return
                    $this->redirectToRoute('userdata_new');
            }

            if ($dataemail != null && $dataemail != $userconnecter->getId()) {
                $this
                    ->get('session')->getFlashBag()
                    ->add('emailunique', "L'adresse email est déjà utilisée");
                return
                    $this->redirectToRoute('userdata_new');
            }

            if ($ajout) {
                $em->persist($userdatum);
            }
            $em->flush();

            $urlavatar = $this->getDoctrine()
                ->getRepository(Userdata::class)
                ->get_gravatar($userdatum->getUtilisateur()->getEmail());
            $this->get('session')->getFlashBag()->add('modifdemande', true);
            $this->get('session')->getFlashBag()->add('messagemodif', 'Votre modification est bien prise en compte');
            $this->get('session')->getFlashBag()->add('class', 'gritter');
            $this->get('session')->getFlashBag()->add('urlavatar', $urlavatar);
            $this->get('session')->getFlashBag()->add('username', $userdatum->getUtilisateur()->getUsername());

//            ENVOI DE MAIL
            if ($ajout) {
                $transport = \Swift_SmtpTransport::newInstance()
                    ->setHost('smtp-appli.gouv.sn');

                $mailer = \Swift_Mailer::newInstance($transport);

                $message = \Swift_Message::newInstance()
                    ->setSubject('Votre demande d\'emploi a été soumise avec succès - 
                Plateforme de Gestion des Demandes d\'Emploi (PGDE)')
//                    ->setSender('Fonction publique')
                    ->setFrom($this->container->getParameter('sender_address'),
                        $this->container->getParameter('sender_name'))
                    ->setTo($userdatum->getUtilisateur()->getEmail())
                    ->setBody(
                        $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                            '@PgdeEmploi/Email/sendinfo.email.twig',
                            array('user' => $userdatum->getUtilisateur())
                        ),
                        'text/html'
                    )
                ;
                $mailer->send($message);
            }
            $response = $this->forward('PgdeEmploiBundle:Userdata:reussi', array(
                'ajout'  => $ajout
            ));
//            return $this->redirectToRoute('userdata_reussi');
            return $response;
        }


        return $this->render('userdata/new.html.twig', array(
            'userdatum' => $userdatum,
            'urlavatar' => $avatar,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a userdatum entity.
     *
     * @Route("/{id}", name="userdata_show")
     * @Method("GET")
     * @param Userdata $userdatum
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Userdata $userdatum)
    {
        $deleteForm = $this->createDeleteForm($userdatum);

        return $this->render('userdata/show.html.twig', array(
            'userdatum' => $userdatum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing userdatum entity.
     *
     * @Route("/{id}/edit", name="userdata_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Userdata $userdatum)
    {
        $deleteForm = $this->createDeleteForm($userdatum);
        $editForm = $this->createForm('Pgde\EmploiBundle\Form\UserdataType', $userdatum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('userdata_edit', array('id' => $userdatum->getId()));
        }

        return $this->render('userdata/edit.html.twig', array(
            'userdatum' => $userdatum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a userdatum entity.
     *
     * @Route("/{id}", name="userdata_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Userdata $userdatum)
    {
        $form = $this->createDeleteForm($userdatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userdatum);
            $em->flush();
        }

        return $this->redirectToRoute('userdata_index');
    }

    /**
     * Creates a form to delete a userdatum entity.
     *
     * @param Userdata $userdatum The userdatum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Userdata $userdatum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userdata_delete', array('id' => $userdatum->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     *
     * @Route("/success/", name="userdata_reussi")
     * @Method("GET")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function reussiAction($ajout)
    {
        return $this->render('userdata/reussi.html.twig', [
            'ajout' =>  $ajout
        ]);
    }
}
