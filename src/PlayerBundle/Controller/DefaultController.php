<?php
/**
 * @author Ercan K.
 */

namespace PlayerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * Controller for the Players (a.k.a. PlayerBundle)
 * @package GuitarBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/player"), name="player_list")
     */
    public function listAction()
    {
        // Get the repository for selections
        $o_playerrepo = $this->getDoctrine()->getRepository('PlayerBundle:Player');

        // Get (find) all entries
        $a_players = $o_playerrepo->findAll();

        // Render the template with the search results
        return $this->render('PlayerBundle::list.html.twig', ['players' => $a_players]);
    }

    /**
     * @Route("/player/details/{i_playerid}", name="player_details")
     */
    public function detailsAction($i_playerid)
    {
        // Get the repository for selections
        $o_playerrepo = $this->getDoctrine()->getRepository('PlayerBundle:Player');

        // Get the entry by using the Player-ID ($i_playerid)
        $a_player = $o_playerrepo->find($i_playerid);

        // Render the details template with the fetched player data
        return $this->render('PlayerBundle::details.html.twig', ['player' => $a_player]);
    }

    /**
     * @Route("/player/add", name="player_add_form")
     */
    public function newFormAction()
    {
        return $this->render('PlayerBundle::newform.html.twig');
    }


    /**
     * @Route("/player/add", name="player_add_post")
     * @method("post")
     */
    public function insertAction()
    {
        return $this->render('<h2>Success</h2>');
    }


    /**
     * @Route("/player/edit/{i_playerid}", name="player_edit_form")
     */
    public function editFormAction($i_playerid)
    {
        return $this->render('PlayerBundle::editform.html.twig');
    }

    /**
     * @Route("/player/edit", name="player_edit_post")
     * @method("post")
     */
    public function updateAction()
    {
        return $this->render('<h2>Success</h2>');
    }
}
