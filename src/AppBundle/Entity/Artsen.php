<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 14/11/2018
 * Time: 12:11
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="artsen")
 */
class Artsen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $ID;
    /**
     * @ORM\Column(type="string")
     */
    private $voornaam;
    /**
     * @ORM\Column(type="string")
     */
    private $tussenvoegsel;
    /**
     * @ORM\Column(type="string")
     */
    private $achternaam;
    /**
     * @ORM\Column(type="string")
     */
    private $specialisatie;
    /**
     * @ORM\Column(type="string")
     */
    private $straat;
    /**
     * @ORM\Column(type="string")
     */
    private $postcode;
    /**
     * @ORM\Column(type="string")
     */
    private $stad;
    /**
     * @ORM\Column(type="string")
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     */
    private $telefoonadres;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * @param mixed $voornaam
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;
    }

    /**
     * @return mixed
     */
    public function getTussenvoegsel()
    {
        return $this->tussenvoegsel;
    }

    /**
     * @param mixed $tussenvoegsel
     */
    public function setTussenvoegsel($tussenvoegsel)
    {
        $this->tussenvoegsel = $tussenvoegsel;
    }

    /**
     * @return mixed
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * @param mixed $achternaam
     */
    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;
    }

    /**
     * @return mixed
     */
    public function getSpecialisatie()
    {
        return $this->specialisatie;
    }

    /**
     * @param mixed $specialisatie
     */
    public function setSpecialisatie($specialisatie)
    {
        $this->specialisatie = $specialisatie;
    }

    /**
     * @return mixed
     */
    public function getStraat()
    {
        return $this->straat;
    }

    /**
     * @param mixed $straat
     */
    public function setStraat($straat)
    {
        $this->straat = $straat;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return mixed
     */
    public function getStad()
    {
        return $this->stad;
    }

    /**
     * @param mixed $stad
     */
    public function setStad($stad)
    {
        $this->stad = $stad;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefoonadres()
    {
        return $this->telefoonadres;
    }

    /**
     * @param mixed $telefoonadres
     */
    public function setTelefoonadres($telefoonadres)
    {
        $this->telefoonadres = $telefoonadres;
    }

}