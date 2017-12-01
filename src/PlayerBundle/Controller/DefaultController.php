<?php

namespace PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/player")
     */
    public function listAction()
    {
        return $this->render('PlayerBundle:Default:index.html.twig');
    }

    /**
     * @Route("/player/details/{iPlayerId}")
     */
    public function detailsAction($iPlayerId)
    {
        return $this->render('PlayerBundle:Default:index.html.twig');
    }

    /**
     * @Route("/player/add")
     */
    public function addFormAction()
    {
        return $this->render('PlayerBundle:Default:index.html.twig');
    }


    /**
     * @Route("/player/insert")
     * @method("post")
     */
    public function insertAction()
    {
        return $this->render('PlayerBundle:Default:index.html.twig');
    }


    /**
     * @Route("/player/edit/{iPlayerId}")
     */
    public function editFormAction($iPlayerId)
    {
        return $this->render('PlayerBundle:Default:index.html.twig');
    }

    /**
     * @Route("/player/update")
     * @method("post")
     */
    public function updateAction()
    {
        return $this->render('PlayerBundle:Default:index.html.twig');
    }
}
