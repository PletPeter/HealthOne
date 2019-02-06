<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="les")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    /**
     * @ORM\OneToMany(targetEntity="Deelname", mappedBy="les")
     */
    private $deelnames;
    /**
     * @ORM\ManyToOne(targetEntity="Training", inversedBy="lessen")
     * @ORM\JoinColumn(name="training_id", referencedColumnName="id")
     */
    private $training;

    public function __construct()
    {
        $this->deelnames = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getTraining()
    {
        return $this->training;
    }

    /**
     * @param mixed $training
     */
    public function setTraining($training)
    {
        $this->training = $training;
    }
    /**
     * @return mixed
     */
    public function getDeelnames()
    {
        return $this->deelnames;
    }

    /**
     * @param mixed $deelnames
     */
    public function setDeelnames($deelnames)
    {
        $this->deelnames = $deelnames;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
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
     * @return \String
     */
    public function getTijd()
    {
        return $this->tijd->format('G:i');
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
     * @return \String
     */
    public function getDatum()
    {
        return $this->datum->format('Y-m-d');
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

