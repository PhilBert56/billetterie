<?php

namespace TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TicketBundle\TicketFolder\TicketFolder;

class DefaultController extends Controller
{
    /**
     * @Route("/ticket")
     */


    public function indexAction()
    {

        //$ticketFolder = new TicketFolder();


        return $this->render('TicketBundle:default:index.html.twig');
    }

    public function getTicketFolder()
    {
        $session = $this->get('session');
        $ticketFolder = $session->get('ticketFolder');
        if (!$ticketFolder) $ticketFolder = new TicketFolder($session);
        return $ticketFolder;
    }
}