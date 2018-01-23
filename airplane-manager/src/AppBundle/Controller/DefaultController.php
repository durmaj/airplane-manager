<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Airplane;
use AppBundle\Entity\Flight;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $airplanes = $em->getRepository('AppBundle:Airplane')->findAll();
        $flights = $em->getRepository('AppBundle:Flight')->findAll();


        return $this->render('default/index.html.twig', ['airplanes' => $airplanes, 'flights' => $flights]);
    }
}
