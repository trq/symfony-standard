<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    public function navTaskAction()
    {
        return $this->render('AppBundle:Task:navTask.html.twig', [
            'navTasks' => 2
        ]);
    }

    public function navTask2Action()
    {
        return $this->render('AppBundle:Task:navTask2.html.twig', [
            'navTasks' => 2
        ]);
    }
}
