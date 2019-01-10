<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Les
 *
 * @ORM\Table(name="les")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LesRepository")
 */
class Les
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
     * @var \DateTime
     *
     * @ORM\Column(name="tijd", type="time")
     */
    private $tijd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datum", type="date")
     */
    private $datum;

    /**
     * @var string
     *
     * @ORM\Column(name="locatie", type="string", length=50)
     */
    private $locatie;

    /**
     * @var int
     *
     * @ORM\Column(name="personenmax", type="smallint")
     */
    private $personenmax;


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
     * Set tijd
     *
     * @param \DateTime $tijd
     *
     * @return Les
     */
    public function setTijd($tijd)
    {
        $this->tijd = $tijd;

        return $this;
    }

    /**
     * Get tijd
     *
     * @return \DateTime
     */
    public function getTijd()
    {
        return $this->tijd;
    }

    /**
     * Set datum
     *
     * @param \DateTime $datum
     *
     * @return Les
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum
     *
     * @return \DateTime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set locatie
     *
     * @param string locatie
     *
     * @return Les
     */
    public function setLocatie($locatie)
    {
        $this->locatie = $locatie;

        return $this;
    }

    /**
     * Get locatie
     *
     * @return string
     */
    public function getLocatie()
    {
        return $this->locatie;
    }

    /**
     * Set personenmax
     *
     * @param integer $personenmax
     *
     * @return Les
     */
    public function setPersonenmax($personenmax)
    {
        $this->personenmax = $personenmax;

        return $this;
    }

    /**
     * Get personenmax
     *
     * @return int
     */
    public function getPersonenmax()
    {
        return $this->personenmax;
    }
}

