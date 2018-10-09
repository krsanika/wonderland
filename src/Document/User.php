<?php
/**
 * Created by PhpStorm.
 * User: Krsanika
 * Date: 2018-07-05
 * Time: 오전 8:46
 */

namespace App\Document;


use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use App\Repository\UserRepository;

/**
 * @ODM\Document(collection="user", repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, EquatableInterface, \Serializable
{
    /**
     * @ODM\Id(name="_id")
     */
    protected $id;

    /**
     * @ODM\Field(type="string")
     */
    protected $username;

    /**
     * @ODM\Field(type="string")
     */
    protected $password;

    /**
     * @ODM\Field(type="string")
     */
    protected $plainPassword;

    /**
     * @ODM\Collection
     */
    protected $roles = array();

    /**
     * @ODM\Field(type="string")
     */
    protected $salt;

    /**
     * @ODM\Boolean
     */
    protected $isActive;
// Setter

    /**
     * @param String
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param String
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param String
     */
    public function setRole($role)
    {
        $this->roles[] = $role;
    }

    /**
     * @param array
     */
    public function setRoles(array $roles)
    {
        $this->roles = (array) $roles;
    }

    /**
     * @param String
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

// Getter


    /**
     * @return String
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @return String
     */
    public function getSalt()
    {
        return $this->salt;
    }

// General

    public function __construct()
    {
        $this->roles = ['ROLE_USER'];
        $this->isActive = true;
//        $this->salt = '';
    }

    public function isEqualTo(UserInterface $user)
    {
        return $user->getUsername() === $this->username;
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized, array('allowed_classes' => false));
    }


}