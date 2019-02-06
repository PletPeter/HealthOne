<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 14/01/2019
 * Time: 13:48
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="training")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrainingRepository");
 */
class Training
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="text", length=26)
     */
    private $naam;
    /**
     * @ORM\Column(type="text", length=255)
     */
    private $descriptie;
    /**
     * @ORM\Column(type="smallint", length=3)
     */
    private $duratie;
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $extraKosten;
    /**
     * @ORM\OneToMany(targetEntity="Les", mappedBy="training")
     */
    private $lessen;
    public function __construct()
    {
        $this->lessen = new ArrayCollection();
    }

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
    public function getDescriptie()
    {
        return $this->descriptie;
    }

    /**
     * @param mixed $descriptie
     */
    public function setDescriptie($descriptie)
    {
        $this->descriptie = $descriptie;
    }

    /**
     * @return mixed
     */
    public function getDuratie()
    {
        return $this->duratie;
    }

    /**
     * @param mixed $duratie
     */
    public function setDuratie($duratie)
    {
        $this->duratie = $duratie;
    }

    /**
     * @return mixed
     */
    public function getExtraKosten()
    {
        return $this->extraKosten;
    }

    /**
     * @param mixed $extraKosten
     */
    public function setExtraKosten($extraKosten)
    {
        $this->extraKosten = $extraKosten;
    }

    /**
     * @return mixed
     */
    public function getLessen()
    {
        return $this->lessen;
    }

    /**
     * @param mixed $lessen
     */
    public function setLessen($lessen)
    {
        $this->lessen = $lessen;
    }

    /**
     * @return mixed
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }



}