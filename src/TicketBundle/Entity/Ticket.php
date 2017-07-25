<?php
/**
 * Created by PhpStorm.
 * User: BERTHELOT
 * Date: 05/07/2017
 * Time: 23:27
 */

namespace TicketBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ticket")
 */
class Ticket
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfVisit;


    /**
     * @ORM\OneToOne(targetEntity="Visitor", mappedBy="ticket")
     */
    private $visitor;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceCode;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $halfDay;


    /**
     * @ORM\Column(type="string")
     */
    private $ticketCode;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDateOfVisit()
    {
        return $this->dateOfVisit;
    }

    /**
     * @param mixed $date
     */
    public function setDateOfVisit($dateOfVisit)
    {
        $this->dateOfVisit = $dateOfVisit;
    }

    /**
     * @return mixed
     */
    public function getVisitor()
    {
        return $this->visitor;
    }

    /**
     * @param mixed $visitor
     */
    public function setVisitor($visitor)
    {
        $this->visitor = $visitor;
    }

    /**
     * @return mixed
     */
    public function getPriceCode()
    {
        return $this->priceCode;
    }

    /**
     * @param mixed $priceCode
     */
    public function setPriceCode($priceCode)
    {
        $this->priceCode = $priceCode;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



    /**
     * @return mixed
     */
    public function getTicketCode()
    {
        return $this->ticketCode;
    }

    /**
     * @param mixed $ticketCode
     */
    public function setTicketCode($ticketCode)
    {
        $this->ticketCode = $ticketCode;
    }

    /**
     * @return mixed
     */
    public function getHalfDay()
    {
        return $this->halfDay;
    }

    /**
     * @param mixed $halfDay
     */
    public function setHalfDay($halfDay)
    {
        $this->halfDay = $halfDay;
    }




}