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
        return $this->render('PlayerBundle::list.html.twig');
    }

    /**
     * @Route("/player/details/{i_playerid}")
     */
    public function detailsAction($i_playerid)
    {
        return $this->render('PlayerBundle::details.html.twig');
    }

    /**
     * @Route("/player/add")
     */
    public function newFormAction()
    {
        return $this->render('PlayerBundle::newform.html.twig');
    }


    /**
     * @Route("/player/add")
     * @method("post")
     */
    public function insertAction()
    {
        return $this->render('<h2>Success</h2>');
    }


    /**
     * @Route("/player/edit/{i_playerid}")
     */
    public function editFormAction($i_playerid)
    {
        return $this->render('PlayerBundle::editform.html.twig');
    }

    /**
     * @Route("/player/edit")
     * @method("post")
     */
    public function updateAction()
    {
        return $this->render('<h2>Success</h2>');
    }
}
