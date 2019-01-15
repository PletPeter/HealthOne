<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 14/01/2019
 * Time: 14:17
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="deelname")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeelnameRepository")
 */
class Deelname
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $betaald;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="deelname")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="Les", inversedBy="deelnames")
     * @ORM\JoinColumn(name="les_id", referencedColumnName="id")
     */
    private $les;

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
    public function getBetaald()
    {
        return $this->betaald;
    }

    /**
     * @param mixed $betaald
     */
    public function setBetaald($betaald)
    {
        $this->betaald = $betaald;
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
     * @return mixed
     */
    public function getLes()
    {
        return $this->les;
    }

    /**
     * @param mixed $les
     */
    public function setLes($les)
    {
        $this->les = $les;
    }

}