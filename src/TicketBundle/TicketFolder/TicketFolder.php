<?php

namespace TicketBundle\TicketFolder;

use TicketBundle\Entity;

use TicketBundle\Entity\Customer;
//use Doctrine\ORM\EntityManager;

use Symfony\Component\HttpFoundation\Session\Session;

class TicketFolder
{

    private $session;
    //private $em;

    private $invoiceDate;
    private $dateOfVisit;
    private $customer;
    private $tickets;
    private $totalAmount;


    public function __construct(Session $session)
    {
        $this->session = $session;
        //$this->em = $em;
        $this->lastDateOfVisit = new \Datetime();
        $this->invoiceDate = new \Datetime();
        $this->customer = new Customer();
        $this->tickets = [];
        $session->set('ticketFolder', $this );
    }


    public function getLastDateOfVisit()
    {
        return $this->lastDateOfVisit;
    }

    public function setDateOfVisit($lastDateOfVisit)
    {
        $this->dateOfVisit = $lastDateOfVisit;
    }



    public function getCustomer()
    {
        return $this->customer;
    }


    public function setTickets($tickets)
    {
        $this->tickets[] = $tickets ;
    }


    public function addTicketToTicketFolder($ticket)
    {

        $isInFolder = false;
        /* si un ticket a déjà été généré pour ce visiteur alors c'est une simple modification */

        foreach ($this->tickets as $t)
        {
            if ($t->getVisitor()->getName() == $ticket->getVisitor()->getName()
                && $t->getVisitor()->getFirstName() == $ticket->getVisitor()->getFirstName()
            ) {
                $t->setVisitor($ticket->getVisitor()) ;
                $isInFolder = true;
                break;
            }
        }
        if (!$isInFolder) {
            $this->tickets [] = $ticket;
            $this->session->set('ticketfolder', $this);
        }
    }


    public function cancelVisitorAndAssociatedTicket($firstName, $lastName){

        foreach( $this->tickets  as $ticket){

            if($ticket instanceof Entity\Ticket)
            {
                $visitor = $ticket->getVisitor();

                if ($visitor->getfirstName() == $firstName && $visitor->getName() == $lastName ) {
                    unset ($visitor);
                    unset ($this->tickets [array_search($ticket, $this->tickets)]);
                    unset ($ticket);

                    //$this->setTickets($this->tickets);
                    $this->session->set('ticketFolder', $this);
                }
             }
        }



    }





    public function getTickets(){
        return $this->tickets;
    }


    public function getTotal() {
    }


    public function emptyTicketFolder (){
    }



}