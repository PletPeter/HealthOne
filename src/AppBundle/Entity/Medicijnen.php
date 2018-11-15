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
 * @ORM\Table(name="medicijnen")
 */
class Medicijnen
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
    private $medicijnnaam;
    /**
     * @ORM\Column(type="text")
     */
    private $beschrijving;
    /**
     * @ORM\Column(type="text")
     */
    private $bijwerkingen;

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
    public function getMedicijnnaam()
    {
        return $this->medicijnnaam;
    }

    /**
     * @param mixed $medicijnnaam
     */
    public function setMedicijnnaam($medicijnnaam)
    {
        $this->medicijnnaam = $medicijnnaam;
    }

    /**
     * @return mixed
     */
    public function getBeschrijving()
    {
        return $this->beschrijving;
    }

    /**
     * @param mixed $beschrijving
     */
    public function setBeschrijving($beschrijving)
    {
        $this->beschrijving = $beschrijving;
    }

    /**
     * @return mixed
     */
    public function getBijwerkingen()
    {
        return $this->bijwerkingen;
    }

    /**
     * @param mixed $bijwerkingen
     */
    public function setBijwerkingen($bijwerkingen)
    {
        $this->bijwerkingen = $bijwerkingen;
    }

}