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


        return $this->render('TicketBundle:default:index.html.twig');
    }


}