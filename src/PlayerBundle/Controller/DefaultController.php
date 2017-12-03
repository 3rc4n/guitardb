<?php
/**
 * @author Ercan K.
 */

namespace PlayerBundle\Controller;

//use Doctrine\DBAL\Types\TextType;
use PlayerBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\HttpFoundation\Request;

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
    public function newFormAction(Request $o_request)
    {
        // Generate a form

        $o_player = new Player();

        $o_form = $this->createFormBuilder($o_player)
            ->add('name',TextType::class, array( 'attr' => array('class'=>'form-control') ))
            ->add('dateofbirth', DateType::class, array(
                                                                'attr' => array('class'=>'form-control'),
                                                                'format' => 'yyyy-MM-dd',
                                                                'years' => range(1900, date('Y'))
                )
            )
            ->add('about', TextareaType::class, array( 'attr' => array('class'=>'form-control') ))
            ->add('save', SubmitType::class, array( 'attr' => array( 'type'=>'button', 'id' => 'btnSave', 'class'=>'btn btn-primary') ))
            ->getForm();

        $o_form->handleRequest($o_request);

        if ($o_form->isSubmitted() && $o_form->isValid()) {

            $o_player = $o_form->getData();

            $o_em = $this->getDoctrine()->getManager();
            $o_em->persist($o_player);
            $o_em->flush();

            return $this->redirectToRoute('player_add_success');
        }


        return $this->render('PlayerBundle::newform.html.twig', [ 'form' => $o_form->createView() ]);
    }
    /**
     * @Route("/player/add/success", name="player_add_success")
     */
    public function successNewFormAction() {
        return $this->render('PlayerBundle::newsuccess.html.twig');
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
