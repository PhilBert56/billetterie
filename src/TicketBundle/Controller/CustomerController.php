<?php
/**
 * Created by PhpStorm.
 * User: BERTHELOT
 * Date: 05/07/2017
 * Time: 21:53
 */

namespace TicketBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CustomerController extends Controller
{
    /**
     * @Route("/Customer", name="customer_view")
     */
    public function newAction()
    {
        return $this->render('TicketBundle:museum:customer.html.twig');
    }
}