<?php
/**
 * @author Ercan K.
 */

namespace GuitarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * Controller for the Guitars (a.k.a. GuitarBundle)
 * @package GuitarBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/guitar", name="guitar_list")
     */
    public function listAction()
    {
        // Get the repository for selections
        $o_guitarrepo = $this->getDoctrine()->getRepository('GuitarBundle:Guitar');

        // Get (find) all entries
        $a_guitars = $o_guitarrepo->findAll();

        // Render the template with the search results
        return $this->render('GuitarBundle::list.html.twig', ['guitars' => $a_guitars]);
    }

    /**
     * @Route("/guitar/details/{i_guitarid}", name="guitar_details")
     */
    public function detailsAction($i_guitarid)
    {
        // Get the repository for selections
        $o_guitarrepo = $this->getDoctrine()->getRepository('GuitarBundle:Guitar');

        // Get the entry by using the Player-ID ($i_playerid)
        $a_guitar = $o_guitarrepo->find($i_guitarid);

        // Render the details template with the fetched guitar data
        return $this->render('GuitarBundle::details.html.twig', ['guitar' => $a_guitar ]);
    }

    /**
     * @Route("/guitar/add", name="guitar_add_form")
     */
    public function newFormAction()
    {
        return $this->render('GuitarBundle::newform.html.twig');
    }


    /**
     * @Route("/guitar/add", name="guitar_add_post")
     * @method("post")
     */
    public function insertAction()
    {
        return new Response('<h2>Success</h2>');
    }


    /**
     * @Route("/guitar/edit/{i_guitarid}", name="guitar_edit_form")
     */
    public function editFormAction($i_guitarid)
    {
        return $this->render('GuitarBundle::editform.html.twig');
    }

    /**
     * @Route("/guitar/edit", name="guitar_edit_post")
     * @method("post")
     */
    public function updateAction()
    {
        return new Response('<h2>Success</h2>');
    }
}
