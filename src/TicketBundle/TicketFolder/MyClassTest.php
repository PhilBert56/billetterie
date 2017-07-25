<?php


namespace TicketBundle\TicketFolder;


class MyClassTest
{
    private $dateOfVisit;


    public function __construct()
    {
        $this->dateOfVisit = new \Datetime();
    }

    public function getDateOfVisit()
    {
        return $this->dateOfVisit;
    }


    public function setDateOfVisit($d)
    {
        $this->dateOfVisit = $d;
    }
}