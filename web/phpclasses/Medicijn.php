<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 08/10/2018
 * Time: 08:57
 */

class Medicijn
{
    private $ID;
    private $medicijnnaam;
    private $beschrijving;
    private $bijwerkingen;

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
    public function getBeschrijving()
    {
        return $this->beschrijving;
    }

    /**
     * @return mixed
     */
    public function getBijwerkingen()
    {
        return $this->bijwerkingen;
    }

    /**
     * @return mixed
     */
    public function getMedicijnNaam()
    {
        return $this->medicijnnaam;
    }

}