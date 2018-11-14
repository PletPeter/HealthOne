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

}