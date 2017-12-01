<?php

namespace GuitarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/guitar")
     */
    public function listAction()
    {
        return $this->render('GuitarBundle:Default:index.html.twig');
    }

    /**
     * @Route("/guitar/details/{i_guitarid}")
     */
    public function detailsAction($i_guitarid)
    {
        return $this->render('GuitarBundle:Default:index.html.twig');
    }

    /**
     * @Route("/guitar/add")
     */
    public function newFormAction()
    {
        return $this->render('GuitarBundle:Default:index.html.twig');
    }


    /**
     * @Route("/guitar/add")
     * @method("post")
     */
    public function insertAction()
    {
        return $this->render('GuitarBundle:Default:index.html.twig');
    }


    /**
     * @Route("/guitar/edit/{i_guitarid}")
     */
    public function editFormAction($i_guitarid)
    {
        return $this->render('GuitarBundle:Default:index.html.twig');
    }

    /**
     * @Route("/guitar/edit")
     * @method("post")
     */
    public function updateAction()
    {
        return $this->render('GuitarBundle:Default:index.html.twig');
    }
}
