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
        $em = $this->getDoctrine()->getManager();

        $userdatas = $em->getRepository('PgdeEmploiBundle:Userdata')->findAll();

        return $this->render('userdata/index.html.twig', array(
            'userdatas' => $userdatas,
        ));
    }

    /**
     * Creates a new userdatum entity.
     *
     * @Route("/new", name="userdata_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $userconnecter = $this->getUser();
        $repository = $this->getDoctrine()->getRepository(Userdata::class);
        $userdatum = $repository->findOneBy(['utilisateur' => $userconnecter]);
        $avatar = $repository->get_gravatar($userconnecter->getEmail());
        $ajout = false;
        if ($userdatum == null) {
            $ajout = true;
            $userdatum = new Userdata();
            $userdatum->setUtilisateur($userconnecter);
        }
        $form = $this->createForm('Pgde\EmploiBundle\Form\UserdataType', $userdatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($ajout) {
                $em->persist($userdatum);
            }
            $em->flush();

            return $this->redirectToRoute('userdata_new');
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
}
