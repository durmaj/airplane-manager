<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Airplane;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Flight
 *
 * @ORM\Table(name="flight")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FlightRepository")
 */
class Flight
{
    /**
     * @ORM\ManyToOne(targetEntity="Airplane")
     * @ORM\JoinColumn(name="airplane_id", referencedColumnName="id")
     * @Assert\NotBlank
     */
    private $airplane;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="departAirport", type="string", length=255)
     */
    private $departAirport;

    /**
     * @var string
     *
     * @ORM\Column(name="arrivalAirport", type="string", length=255)
     */
    private $arrivalAirport;

    /**
     * @var int
     * @Assert\GreaterThan(0)
     * @ORM\Column(name="flightTime", type="integer")
     */
    private $flightTime;

    // getters & setters

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set departAirport
     *
     * @param string $departAirport
     *
     * @return Flight
     */
    public function setDepartAirport($departAirport)
    {
        $this->departAirport = $departAirport;

        return $this;
    }

    /**
     * Get departAirport
     *
     * @return string
     */
    public function getDepartAirport()
    {
        return $this->departAirport;
    }

    /**
     * Set arrivalAirport
     *
     * @param string $arrivalAirport
     *
     * @return Flight
     */
    public function setArrivalAirport($arrivalAirport)
    {
        $this->arrivalAirport = $arrivalAirport;

        return $this;
    }

    /**
     * Get arrivalAirport
     *
     * @return string
     */
    public function getArrivalAirport()
    {
        return $this->arrivalAirport;
    }

    /**
     * Set flightTime
     *
     * @param integer $flightTime
     *
     * @return Flight
     */
    public function setFlightTime($flightTime)
    {
        $this->flightTime = $flightTime;

        return $this;
    }

    /**
     * Get flightTime
     *
     * @return int
     */
    public function getFlightTime()
    {
        return $this->flightTime;
    }

    /**
     * @return mixed
     */
    public function getAirplane()
    {
        return $this->airplane;
    }

    /**
     * @param mixed $airplane
     */
    public function setAirplane($airplane)
    {
        $this->airplane = $airplane;
    }

}
