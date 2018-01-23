<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Airplane;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Airplane controller.
 *
 * @Route("airplane")
 */
class AirplaneController extends Controller
{
    /**
     * Lists all airplane entities.
     *
     * @Route("/", name="airplane_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $airplanes = $em->getRepository('AppBundle:Airplane')->findAll();

        return $this->render('airplane/index.html.twig', array(
            'airplanes' => $airplanes,
        ));
    }

    /**
     * Creates a new airplane entity.
     *
     * @Route("/new", name="airplane_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $airplane = new Airplane();
        $form = $this->createForm('AppBundle\Form\AirplaneType', $airplane);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($airplane);
            $em->flush();

            return $this->redirectToRoute('airplane_show', array('id' => $airplane->getId()));
        }

        return $this->render('airplane/new.html.twig', array(
            'airplane' => $airplane,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a airplane entity.
     *
     * @Route("/{id}", name="airplane_show")
     * @Method("GET")
     */
    public function showAction(Airplane $airplane)
    {
        $deleteForm = $this->createDeleteForm($airplane);

        return $this->render('airplane/show.html.twig', array(
            'airplane' => $airplane,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing airplane entity.
     *
     * @Route("/{id}/edit", name="airplane_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Airplane $airplane)
    {
        if ($this->isGranted('ROLE_USER')) {


            $deleteForm = $this->createDeleteForm($airplane);
            $editForm = $this->createForm('AppBundle\Form\AirplaneType', $airplane);
            $editForm->handleRequest($request);

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('airplane_edit', array('id' => $airplane->getId()));
            }

            return $this->render('airplane/edit.html.twig', array(
                'airplane' => $airplane,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));

        }
        return $this->redirectToRoute('homepage');


    }

    /**
     * Deletes a airplane entity.
     *
     * @Route("/{id}", name="airplane_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Airplane $airplane)
    {
        if ($this->isGranted('ROLE_USER')) {

            $form = $this->createDeleteForm($airplane);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($airplane);
                $em->flush();
            }

            return $this->redirectToRoute('airplane_index');
        }
        return $this->redirectToRoute('homepage');
    }

    /**
     * Creates a form to delete a airplane entity.
     *
     * @param Airplane $airplane The airplane entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Airplane $airplane)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('airplane_delete', array('id' => $airplane->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
