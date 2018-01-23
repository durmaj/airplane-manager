<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Airplane
 *
 * @ORM\Table(name="airplane")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AirplaneRepository")
 */
class Airplane
{
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     * @Assert\GreaterThan(1900)
     * @Assert\LessThanOrEqual(2018)
     * @ORM\Column(name="prodYear", type="integer")
     */
    private $prodYear;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer", type="string", length=255)
     */
    private $manufacturer;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var int
     * @Assert\GreaterThan(0)
     * @ORM\Column(name="maxPassengers", type="integer")
     */
    private $maxPassengers;

    /**
     * @var int
     * @Assert\GreaterThan(0)
     * @ORM\Column(name="maxLoad", type="integer")
     */
    private $maxLoad;


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
     * Set name
     *
     * @param string $name
     *
     * @return Airplane
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set prodYear
     *
     * @param integer $prodYear
     *
     * @return Airplane
     */
    public function setProdYear($prodYear)
    {
        $this->prodYear = $prodYear;

        return $this;
    }

    /**
     * Get prodYear
     *
     * @return int
     */
    public function getProdYear()
    {
        return $this->prodYear;
    }

    /**
     * Set manufacturer
     *
     * @param string $manufacturer
     *
     * @return Airplane
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Airplane
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set maxPassengers
     *
     * @param integer $maxPassengers
     *
     * @return Airplane
     */
    public function setMaxPassengers($maxPassengers)
    {
        $this->maxPassengers = $maxPassengers;

        return $this;
    }

    /**
     * Get maxPassengers
     *
     * @return int
     */
    public function getMaxPassengers()
    {
        return $this->maxPassengers;
    }

    /**
     * Set maxLoad
     *
     * @param integer $maxLoad
     *
     * @return Airplane
     */
    public function setMaxLoad($maxLoad)
    {
        $this->maxLoad = $maxLoad;

        return $this;
    }

    /**
     * Get maxLoad
     *
     * @return int
     */
    public function getMaxLoad()
    {
        return $this->maxLoad;
    }

    public function __toString()
    {
        return $this->getName();
    }

}
