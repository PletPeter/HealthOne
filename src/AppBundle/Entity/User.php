<?php
/**
 * Created by PhpStorm.
 * User: Marcel
 * Date: 28/11/2018
 * Time: 13:51
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository");
 */
class User implements UserInterface, \Serializable
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     *
     */
    private $password;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = array();
    /**
     * @ORM\Column(type="string", length=25)
     */
    private $naam;
    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $salaris;
    /**
     * @ORM\OneToMany(targetEntity="Les", mappedBy="user")
     */
    private $les;
    /**
     * @ORM\OneToMany(targetEntity="Deelname", mappedBy="user")
     */
    private $deelname;
    public function __construct()
    {
        $this->les = new ArrayCollection();
        $this->deelname = new ArrayCollection();
    }


    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized);
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
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

    /**
     * @return mixed
     */
    public function getSalaris()
    {
        return $this->salaris;
    }

    /**
     * @param mixed $salaris
     */
    public function setSalaris($salaris)
    {
        $this->salaris = $salaris;
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

    /**
     * @return mixed
     */
    public function getDeelname()
    {
        return $this->deelname;
    }

    /**
     * @param mixed $deelname
     */
    public function setDeelname($deelname)
    {
        $this->deelname = $deelname;
    }

}