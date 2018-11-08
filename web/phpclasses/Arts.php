<?php
class Arts
{
    private $ID;
    private $voornaam;
    private $tussenvoegsel;
    private $achternaam;
    private $specialisatie;
    private $straat;
    private $postcode;
    private $stad;
    private $email;
    private $telefoonadres;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return mixed
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * @return mixed
     */
    public function getTussenvoegsel()
    {
        return $this->tussenvoegsel;
    }

    /**
     * @return mixed
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * @return mixed
     */
    public function getSpecialisatie()
    {
        return $this->specialisatie;
    }

    /**
     * @return mixed
     */
    public function getStraat()
    {
        return $this->straat;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @return mixed
     */
    public function getStad()
    {
        return $this->stad;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getTelefoonadres()
    {
        return $this->telefoonadres;
    }
}