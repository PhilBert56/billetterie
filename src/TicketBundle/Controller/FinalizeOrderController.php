<?php

namespace TicketBundle\Form;
namespace TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


//require_once 'C:/PHILIPPE/OpenClass/P4/BilletterieMusee/billets1/vendor/autoload.php';

class FinalizeOrderController extends Controller
{
    /**
     * @Route("/FinalizeOrder", name="finalizeOrder")
     */

    public function storeDataAction(Request $request)
    {

        $session = $this->get('session');
        $tickets = $session->get('tickets');
        $customer = $session->get('customer');




        //dump ($tickets ); die();

        $em = $this->getDoctrine()->getManager();
        //$em->persist($customer);

        foreach ($tickets as $ticket) {
            $em->persist($ticket);

            $visitor = $ticket->getVisitor();
            //$bd = $visitor->getBirthDate();
            //$visitor->setBirthDate($bd);
            $code = '1234';
            $ticket->setTicketCode($code);

            $em->persist($visitor);

            $this->sendEmail($ticket, $customer);
        }

        $em->flush();



        return $this->render('TicketBundle:museum:finalView.html.twig');

    }

    public function sendEmail($visitors, $customer) {

            $message = \Swift_Message::newInstance()
                ->setSubject('test')
                ->setFrom($this->container->getParameter('mailer_username'))
                ->setTo('phil-bert@club-internet.fr')
                ->setBody('coucou');

            $this->get('mailer')->send($message);
            echo 'Message envoyé';
            $this->addFlash('success', 'coucou envoyé');


    }


}