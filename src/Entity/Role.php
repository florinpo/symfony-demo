<?php
/**
 * Created by PhpStorm.
 * User: florin.pojum
 * Date: 26/02/2018
 * Time: 14:19
 */

namespace App\Entity;

use Symfony\Component\Security\Core\Role\Role as BaseRole;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="symfony_demo_role")
 * @ORM\Entity()
 */
class Role extends BaseRole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="role", type="string", length=20, unique=true)
     */
    private $role;


    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="userRoles")
     *
     */
    private $users;


    public function __construct()
    {
        $this->users = new ArrayCollection();
    }


    /*
     * methods for RoleInterface
    */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add users
     *
     * @param \App\Entity\User $users
     * @return Role
     */
    public function addUser(\App\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \App\Entity\User $users
     */
    public function removeUser(\App\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}