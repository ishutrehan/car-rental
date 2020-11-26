<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User
{
 /**
  * @ORM\Column(type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
 private $id;
 /**
  * @ORM\Column(name="firstName", type="string", length=25)
  */
 private $firstName;
 /**
  * @ORM\Column(name="lastName", type="string", length=25)
  */
  private $lastName;
 /**
  * @ORM\Column(type="string", length=255)
  */
 private $password;

 /**
  * @ORM\Column(type="string", length=45)
  */
 private $email;

 /**
    * @ORM\Column(name="createdAt", type="datetime")
    */
    private $createdAt;
    
 /**
    * @ORM\Column(name="updatedAt", type="datetime")
    */
    private $updatedAt;

 /**
   * @return mixed
   */
  public function getId()
  {
   return $this->id;
  }
  
 /**
  * User constructor.
  * @param $firstName
  */
 public function __construct($firstName)
 {
  $this->firstName = $firstName;
 }

 /**
  * @return string
  */
 public function getFirstname()
 {
  return $this->firstName;
 }

 /**
  * @param mixed $firstName
  */
 public function setFirstname($firstName): void
 {
  $this->firstName = $firstName;
 }
 /**
  * @return string
  */
  public function getLastname()
  {
   return $this->lastName;
  }
 
  /**
   * @param mixed $lastName
   */
  public function setLastname($lastName): void
  {
   $this->lastName = $lastName;
  }

 /**
  * @return string|null
  */
 public function getSalt()
 {
  return null;
 }

 /**
  * @return string|null
  */
 public function getPassword()
 {
  return $this->password;
 }

 /**
  * @param $password
  */
 public function setPassword($password)
 {
  $this->password = $password;
 }
 /**
  * @return mixed
  */
 public function getEmail()
 {
  return $this->email;
 }

 /**
  * @param mixed $email
  */
 public function setEmail($email): void
 {
  $this->email = $email;
 }
 
 /**
  * @return mixed
  */
  public function getCreatedat(): ?\DateTime
  {
   return $this->createdAt;
  }
 
  /**
   * @param mixed $createdAt
   */
  public function setCreatedAt($createdAt): void
  {
   $this->createdAt = $createdAt;
  }
  /**
  * @return mixed
  */
  public function getUpdatedAt(): ?\DateTime
  {
   return $this->updatedAt;
  }
 
  /**
   * @param mixed $updatedAt
   */
  public function setUpdatedAt($updatedAt): void
  {
   $this->updatedAt = $updatedAt;
  }

 public function eraseCredentials()
 {

 }
}