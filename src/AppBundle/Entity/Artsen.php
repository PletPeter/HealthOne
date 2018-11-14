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
}