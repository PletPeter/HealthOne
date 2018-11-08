<?php
class Patient
{
    private $ID;
    private $voornaam;
    private $tussenvoegsel;
    private $achternaam;
    private $pasnummer;
    private $straat;
    private $postcode;
    private $stad;
    private $email;
    private $telefoonadres;
    private $artsid;

    /**
     * @return mixed
     */public function getID()
{
    return $this->ID;
}
/**
 * @return mixed
 */public function getVoornaam()
{
    return $this->voornaam;
}
/**
 * @return mixed
 */public function getTussenvoegsel()
{
    return $this->tussenvoegsel;
}
/**
 * @return mixed
 */public function getAchternaam()
{
    return $this->achternaam;
}
/**
 * @return mixed
 */public function getPasnummer()
{
    return $this->pasnummer;
}
/**
 * @return mixed
 */public function getStraat()
{
    return $this->straat;
}
/**
 * @return mixed
 */public function getPostcode()
{
    return $this->postcode;
}
/**
 * @return mixed
 */public function getStad()
{
    return $this->stad;
}
/**
 * @return mixed
 */public function getEmail()
{
    return $this->email;
}
/**
 * @return mixed
 */public function getTelefoonadres()
{
    return $this->telefoonadres;
}
/**
 * @return mixed
 */public function getArtsID()
{
    return $this->artsid;
}
}